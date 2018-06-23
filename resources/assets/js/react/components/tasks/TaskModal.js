import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import Comments from '../comments/Comments';
import moment from 'moment';

export default class TaskModal extends Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
      }

      HideModal() {
        this.props.state.showModal = false;
        this.props.state.loadingComments = true;
        this.setState({
            showModal: false,
            loadingComments: true,
        }) 
      }

      CheckCompletion(data) {
          var input = [];
          if (data == 1 ){
            input = 'Completed'
          } else {
            input = 'Incomplete'
          }
          return input;
      }

      render() {
            if(this.props.state.showModal == true) {
                return (
                <div id="myModal" class="modal show" role="dialog" show="true">
                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">
                        <div class="modal-body h-500">
                            <div class="col-md-6 p-15" >
                            <h3>Task Details</h3>
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <p>
                                        <b>Posted By:</b>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    {this.props.state.modalTask.title}.
                                </div>
                            </div>  
                            <hr />
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Completed:</b></p>
                                </div>
                                <div class="col-md-9">
                                    { this.CheckCompletion(this.props.state.modalTask.completed) }.
                                </div>
                            </div> 
                            <hr />
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Submitted:</b></p>
                                </div>
                                <div class="col-md-9">
                                {moment(this.props.state.modalTask.created_at).format("MMM Do YY") }.
                                </div>
                            </div> 
                            <hr />
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Details:</b></p>
                                </div>
                                <div class="col-md-9">
                                    {this.props.state.modalTask.notes}.
                                </div>
                            </div> 
                            <hr />
                            </div>
                            <div class="col-md-6 comments-window">
                            <h3 class="mt-0">Comments</h3>
                            <Comments type="task" item={this.props.state.modalTask} state={this.state} />   
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onClick={this.HideModal.bind(this)} class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </div>

                    </div>
                    </div>
             )
            } else {
                return (
                    <div class="hidden">
                    </div>
                )
            }
      }
}