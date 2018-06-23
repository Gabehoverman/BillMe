import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import Notification from '../Notification';
 
/* An example React component */
class DiscussionForm extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.state = {
            amount: [],
            showDiscussionForm: false,
        }
      }

    HideModal() {
        this.props.state.showDiscussionForm = false;
        this.setState({
            showDiscussionForm: false,
        }) 
      }

    handleSubmit(event) {
        event.preventDefault();
        var submission = {
            title: this.title.value,
            description: this.description.value,
        }
        this.setState({
        })
        this.newTask(JSON.stringify(submission));
      }

      newTask(data) {
          console.log(data);
        fetch('/api/v1/posts',{
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
              this.setState({
                tasks: this.props.state.discussions.concat(myJson),
                showDiscussionForm: false,
              });
              this.HideModal();
              Notification.openNotificationWithIcon('success','Successfully Added')
          });
    }

    render() {
        if (this.props.state.showDiscussionForm == true )
        return (
            <div id="myModal" class="modal show" role="dialog" show="true">
            <form onSubmit={this.handleSubmit.bind(this)}>
            <div class="modal-dialog">

                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Discussion</h4>
                </div>
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="amount">Discussion Title</label>
                        <input type="text" step="00.01"  ref={(input) => this.title = input} value={this.amount} class="form-control" id="amount" aria-describedby="amount" placeholder="Amount"/>
                    </div>
                    <div class="form-group">
                        <label for="notes">Description</label>
                        <textarea type='text' ref={(input) => this.description = input} class="form-control" id="message-text"></textarea>                    
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
 
export default DiscussionForm;