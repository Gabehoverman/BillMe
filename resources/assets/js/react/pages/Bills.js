import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import TotalBills from '../components/bills/TotalBills';
import BillsTable from '../components/bills/BillsTable';
import UserShare from '../components/bills/UserShare';
import TotalPayments from '../components/payments/TotalPayments';
import UserPayments from '../components/payments/UserPayments';
import PaymentsTable from '../components/payments/PaymentsTable';
import PaymentForm from '../components/payments/PaymentForm';
 
/* An example React component */
export default class Bills extends Component {

    constructor(props) {
        super(props);
    
        this.state = {
            bills: [],
            payments: [],
            totalBills: [],
            totalPayments: [],
            userShare: [],
            userPayments: [],
            loadingBills: true,
            loadingPayments: true,
        };
      }

    componentDidMount() {
        this.BillsData();
        this.PaymentsData();
      }

    BillsData() {
        fetch('/api/v1/bills/data',{
            credentials: 'same-origin',
            headers: new Headers({
              'Content-Type': 'application/json',
            })
          })
          .then(function(response) {
              return response.json();
          })
          .then(
            (myJson) => {
                console.log(myJson);
              this.setState({
                bills: myJson.Bills,
                totalBills: myJson.Total,
                userShare: myJson.Share,
                loadingBills: false,
              });
                //this.setState({maintenance: this.myJson})
          });
    }

    PaymentsData() {
        fetch('/api/v1/payments/data',{
            credentials: 'same-origin',
            headers: new Headers({
              'Content-Type': 'application/json',
            })
          })
          .then(function(response) {
              return response.json();
          })
          .then(
            (myJson) => {
                console.log(myJson);
              this.setState({
                payments: myJson.Payments,
                totalPayments: myJson.Total,
                userPayments: myJson.UserPayments,
                loadingPayments: false,
              });
                //this.setState({maintenance: this.myJson})
          });
    }

    render() {
        return (
            <div class="container-fluid">
                <div class="row">
                <TotalBills state={this.state} />
                <TotalPayments state={this.state} />
                <UserShare state={this.state} />
                <UserPayments state={this.state} />
            </div>

            <div class="row">
                <BillsTable state={this.state}/>
                <PaymentsTable state={this.state} />
            </div>
        </div>
        );
    }
}