import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import moment from 'moment';
import PaymentForm from './PaymentForm';
import Comments from '../comments/Comments';
import Notification from '../Notification';
import { Menu, Dropdown, Icon, Table, Divider, Popconfirm } from 'antd';

const floatButton = {
    float: 'right',
    'margin': '-60px 20px 10px 10px'
  }
 
/* An example React component */
class PaymentsTable extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.DeleteItem = this.DeleteItem.bind(this);
        this.state.showModal = false;
        this.state.modalPayment= [];
        this.state.loadingComments = true;
        this.state.showPaymentForm = false;
      }

    DeleteItem(index) {
        alert(index);
    }

    DeletePayment(id) {
        console.log(id);
      fetch('/api/v1/payments/'+id,{
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
                    payments: [...this.props.state.payments.slice(0, id), ...this.props.state.payments.slice(id+1)],
                  });
                  payments: [...this.props.state.payments.slice(0, id), ...this.props.state.payments.slice(id+1)];
                  $('.paymentsTable #'+id).remove();
                  Notification.openNotificationWithIcon('success','Successfully Removed')
            } else {
                Notification.openNotificationWithIcon('error','Could not Remove')
            }
              //this.setState({maintenance: this.myJson})
        });
  }

    ShowDetails(data) {
        this.setState({
            showModal: true,
            modalPayment: data,
            loadingComments: true,
        })
    }

    ShowPaymentForm() {
        this.setState({
            showPaymentForm: true,
        })
    }

    render() {
        if (this.props.state.loadingPayments == true) {
            return(
                <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Payments</h4>
                        

                        <p class="category">Here is where all your payments will show.</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                    <ClipLoader
                            color={'#00d1b2'} 
                            loading={this.props.state.loadingPayments }
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
                            <h4 class="title">Payments</h4>
                            <p class="category">Here is where all your payments will show.</p>
                        </div>
                        <PaymentForm state={this.state} />
                        <div class="content table-responsive table-full-width">
                        <button style={floatButton} className="btn float-right" onClick={this.ShowPaymentForm.bind(this)}>Add Payment </button>
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Paid</th>
                                <th></th>
                                </thead>
                                { this.props.state.payments.map((payment,index) => {
                                       return(
                                         <tbody class='paymentsTable'>
                                             <tr id={payment.id}>
                                             <td onClick={this.ShowDetails.bind(this, payment)}>{payment.id}</td>
                                            <td onClick={this.ShowDetails.bind(this, payment)}>{payment.amount} </td>
                                             <td onClick={this.ShowDetails.bind(this, payment)}>{moment(payment.created_at).format("MMM Do YY")}</td>
                                             <td onClick={this.ShowDetails.bind(this, payment)}>{payment.complete}<i class="fa fa-check"></i></td>
                                             <td>
                                                     <div class="btn-group dropup">
                                                         <Popconfirm title="Sure to delete?" onConfirm={() => this.DeletePayment(payment.id)}>
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
                    <Modal state={this.state} payment={this.modalPayment}/>
                </div>
        );
        }
    }
}
 
export default PaymentsTable;

export class Modal extends Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
      }

      HideModal() {
        this.props.state.showModal = false;
        this.props.state.loadingComments = true;
        this.props.state.comments = [];
        this.setState({
            showModal: false,
            loadingComments: true,
            comments: [],
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
                            <h3>Payment Details</h3>
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <p>
                                        <b>Posted By:</b>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    {this.props.state.modalPayment.user.first_name}.
                                </div>
                            </div>  
                            <hr />
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Completed:</b></p>
                                </div>
                                <div class="col-md-9">
                                    { this.props.state.modalPayment.active }.
                                </div>
                            </div> 
                            <hr />
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Submitted:</b></p>
                                </div>
                                <div class="col-md-9">
                                {moment(this.props.state.modalPayment.created_at).format("MMM Do YY") }.
                                </div>
                            </div> 
                            <hr />
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Details:</b></p>
                                </div>
                                <div class="col-md-9">
                                    {this.props.state.modalPayment.notes}.
                                </div>
                            </div> 
                            <hr />
                            </div>
                            <div class="col-md-6 comments-window">
                            <h3 class="mt-0">Comments</h3>
                            <Comments type="payment" item={this.props.state.modalPayment} state={this.state} />   
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

/*export class Comments extends Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.state.comments = [];
      }

      componentDidMount() {
        this.CommentsData();
      }

    CommentsData() {
        let paymentId = this.props.payment.id;
        fetch('/api/v1/payments/comments/'+paymentId,{
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
              this.props.state.loadingComments = false;
              this.setState({
                comments: this.state.comments.concat(myJson),
                loadingComments: false,
              });
          });
    }

    handleSubmit(event) {
        event.preventDefault();
        this.setState({postComment: true})
        var submission = {
            comment: this.comment.value,
            comment_type: 1,
            item_id: this.props.payment.id,
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
        if(this.props.state.loadingComments == true) {
            return(<ClipLoader
                color={'#00d1b2'} 
                loading={this.props.state.loadingComments }
                size='120' 
            />     )
        } else {
            return (
                <div>
                    <div class="scrollable comments">
                    {this.state.comments.map((comment, index) => {
                        return(
                    <div>
                        <p>{comment.user}</p>
                        <p>{comment.description}</p>
                    </div>)
                    })}                   
                  </div>      
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
}*/