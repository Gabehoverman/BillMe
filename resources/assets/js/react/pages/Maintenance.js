import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import CompletedRequests from '../components/maintenance/CompletedRequests';
import TotalRequests from '../components/maintenance/TotalRequests';
import OutstandingRequests from '../components/maintenance/OutstandingRequests';
import MaintenanceTable from '../components/maintenance/MaintenanceTable';

/* An example React component */
export default class Maintenance extends Component {

    constructor(props) {
        super(props);
        this.state = {
            maintenance: [],
            completed: [],
            outstanding: [],
            total: [],
            loading: true,
        };
      }

    componentDidMount() {
        this.MaintenanceList();
      }

    MaintenanceList() {
        fetch('/api/v1/maintenance/data',{
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
              let maintenance = myJson;
              console.log(maintenance);
              this.setState({
                maintenance: myJson.Maintenance,
                completed: myJson.Completed,
                outstanding: myJson.Outstanding,
                total: myJson.Total,
                loading: false,
              });
                //this.setState({maintenance: this.myJson})
          });
    }

    updateList(data){
        this.setState({
            maintenance: this.state.maintenance.concat(this.data)
        })
    }

    render() {
        return (
            <div class="container-fluid">
                <div class="row">
                    <TotalRequests state={this.state} />
                    <CompletedRequests state={this.state}/>
                    <OutstandingRequests state={this.state} />
                </div>
                <div class="row">
                    <MaintenanceTable state={this.state} />
            </div>
        </div>
        );
    }
}