import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import moment from 'moment';
import BillForm from './BillForm';
import Comments from '../comments/Comments';
import Notification from '../Notification';
import { Menu, Dropdown, Icon, Table, Divider, Popconfirm } from 'antd';

const floatButton = {
    float: 'right',
    'margin': '-60px 20px 10px 10px'
  }
 
/* An example React component */
class BillsTable extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.DeleteBill = this.DeleteBill.bind(this);
        this.state.showModal = false;
        this.state.modalBill= [];
        this.state.loadingBillComments = true;
        this.state.showBillForm = false;
      }

      DeleteBill(id) {
        console.log(id);
      fetch('/api/v1/bills/'+id,{
          method: 'DELETE',
          credentials: 'same-origin',
          headers: new Headers({
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          }),
          //body: id,
        })
        .then(function(response) {
            return response.json();
        })
        .then(
          (myJson) => {
            if (myJson == 204) {
                this.setState({
                    bills: [...this.props.state.bills.slice(0, id), ...this.props.state.bills.slice(id+1)],
                  });
                  bills: [...this.props.state.bills.slice(0, id), ...this.props.state.bills.slice(id+1)];
                  $('.billsTable #'+id).remove();
                  Notification.openNotificationWithIcon('success','Successfully Removed')
            } else {
                alert('Could not delete');
                Notification.openNotificationWithIcon('error','Could not Remove')
            }
              //this.setState({maintenance: this.myJson})
        });
  }

      ShowDetails(data) {
        this.setState({
            showModal: true,
            modalBill: data,
            loadingBillComments: true,
        })
    }

      ShowBillForm() {
        this.setState({
            showBillForm: true,
        })
    }

    render() {
        if (this.props.state.loadingBills == true) {
            return(
                <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Bills</h4>
                        

                        <p class="category">Here is where all your bills will show.</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                    <ClipLoader
                            color={'#00d1b2'} 
                            loading={this.props.state.loadingBills }
                            size='120' 
                        />     
                    </div>
                </div>
            </div>
            )
        } else {
                return (
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Bills</h4>
                            <p class="category">Here is where all your bills will show.</p>
                        </div>
                        <BillForm state={this.state} />
                        <div class="content table-responsive table-full-width">
                        <button style={floatButton} className="btn float-right" onClick={this.ShowBillForm.bind(this)}>Add Payment </button>
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Paid</th>
                                <th></th>
                                </thead>
                                { this.props.state.bills.map((bill, index) => {
                                       return(
                                         <tbody class='billsTable'>
                                             <tr id={bill.id}>
                                             <td onClick={this.ShowDetails.bind(this, bill)}>{bill.id}</td>
                                            <td onClick={this.ShowDetails.bind(this, bill)}>{bill.amount} </td>
                                             <td onClick={this.ShowDetails.bind(this, bill)}>{moment(bill.created_at).format("MMM Do YY")}</td>
                                             <td onClick={this.ShowDetails.bind(this, bill)}>{bill.complete}<i class="fa fa-check"></i></td>
                                             <td>
                                                     <div class="btn-group dropup">
                                                         <Popconfirm title="Sure to delete?" onConfirm={() => this.DeleteBill(bill.id)}>
                                                            <a  className="text-green" href="javascript:;">Delete</a>
                                                        </Popconfirm>
                                                     </div>
                                                 </td>
                                         </tr>
                                         </tbody>

                                        )
                                         })
                                     } 
                            </table>
                        </div>
                    </div>
                    <Modal state={this.state} bill={this.modalBill}/>
                </div>
        );
        }
    }
}
 
export default BillsTable;

export class Modal extends Component {

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

      render() {
            if(this.props.state.showModal == true) {
                return (
                    <div id="myModal" class="modal show" role="dialog" show="true">
                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">
                        <div class="modal-body h-500">
                            <div class="col-md-6 p-15" >
                            <h3>Bill Details</h3>
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <p>
                                        <b>Posted By:</b>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    {this.props.state.modalBill.user.first_name}.
                                </div>
                            </div>  
                            <hr />
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Completed:</b></p>
                                </div>
                                <div class="col-md-9">
                                    { this.props.state.modalBill.active }.
                                </div>
                            </div> 
                            <hr />
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Submitted:</b></p>
                                </div>
                                <div class="col-md-9">
                                {moment(this.props.state.modalBill.created_at).format("MMM Do YY") }.
                                </div>
                            </div> 
                            <hr />
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Details:</b></p>
                                </div>
                                <div class="col-md-9">
                                    {this.props.state.modalBill.notes}.
                                </div>
                            </div> 
                            <hr />
                            </div>
                            <div class="col-md-6 comments-window">
                            <h3 class="mt-0">Comments</h3>
                            <Comments type="bill" item={this.props.state.modalBill} state={this.state} />   
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

export class Comment extends Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.state.comments = [];
        this.state.postingComment = false;
      }

      componentDidMount() {
        this.CommentsData();
      }

    CommentsData() {
        let billId = this.props.bill.id;
        fetch('/api/v1/bills/comments/'+billId,{
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
              this.props.state.loadingBillComments = false;
              this.setState({
                comments: this.state.comments.concat(myJson),
                loadingBillComments: false,
              });
          });
    }

    handleSubmit(event) {
        event.preventDefault();
        this.setState({postComment: true})
        var submission = {
            comment: this.comment.value,
            comment_type: 0,
            item_id: this.props.bill.id,
        }
        this.newComment(JSON.stringify(submission));
    }

    newComment(data) {
        console.log(data);
      fetch('/api/v1/comments',{
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
              console.log(myJson)
              this.state.postingComment = false;
            this.setState({
              comments: this.state.comments.concat(myJson),
            });
        });
  }

    render() {
        if(this.props.state.loadingBillComments == true) {
            return(<ClipLoader
                color={'#00d1b2'} 
                loading={this.props.state.loadingBillComments }
                size='120' 
            />     )
        } else {
            return (
                <div>
                    <div  class="scrollable comments">
                    {this.state.comments.map((comment, index) => {
                        return(
                    <div>
                        <p>{comment.description}</p>
                        <p className="small">Posted by {comment.user.first_name} {moment(comment.created_at).startOf('hour').fromNow()}</p>
                        <hr />
                    </div>)
                    })}   
                    </div>
                    <ClipLoader loading={this.state.postingComment}
                    color={'#00d1b2'} 
                    size='120' />            
                    <form onSubmit={this.handleSubmit.bind(this)}>
                    <div class="form-group">
                        <label for="amount">Comment</label>
                        <textarea  rows="3" type="textarea" ref={(input) => this.comment = input} value={this.amount} class="form-control" id="amount" aria-describedby="amount" placeholder="Amount"/>
                    </div>         
                    <button class="btn btn-secondary" type="submit">Post Comment</button>           
                    </form>    
                  </div>
            )
        }
    }
}