import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import Notification from '../Notification';
 
/* An example React component */
class TotalPayments extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.state = {
            amount: [],
        }
      }

    HideModal() {
        this.props.state.showPaymentForm = false;
        this.setState({
            showPaymentForm: false,
        }) 
      }

    handleSubmit(event) {
        event.preventDefault();
        var submission = {
            amount: this.amount.value,
            notes: this.notes.value,
        }
        this.setState({
        })
        this.newPayment(JSON.stringify(submission));
        alert('Submitted!');
      }

      newPayment(data) {
          console.log(data);
        fetch('/api/v1/payments',{
            method: 'POST',
            credentials: 'same-origin',
            headers: new Headers({
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }),
            body: data,
          })
          .then(function(response) {
              return response.json();
          })
          .then(
            (myJson) => {
              //console.log(maintenance);
              this.setState({
                payments: myJson,
              });              
              Notification.openNotificationWithIcon('success','Successfully Added')
              this.HideModal();
          }).catch(function(error) {
            Notification.openNotificationWithIcon('error','Could not Add')
          });
    }

    render() {
        if (this.props.state.showPaymentForm == true )
        return (
            <div id="myModal" class="modal show" role="dialog" show="true">
                        <form onSubmit={this.handleSubmit.bind(this)}>
            <div class="modal-dialog">

                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Payment Details</h4>
                </div>
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="amount">Payment Amount</label>
                        <input type="text" step="00.01"  ref={(input) => this.amount = input} value={this.amount} class="form-control" id="amount" aria-describedby="amount" placeholder="Amount"/>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea type='text' ref={(input) => this.notes = input} class="form-control" id="message-text"></textarea>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onClick={this.HideModal.bind(this)} class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </div>
                </div>

            </div>
            </form>

            </div>
        );
        else {
            return (<div />)
        }
    }
}
 
export default TotalPayments;