import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import moment from 'moment';

export default class Comments extends Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.state.comments = [];
        this.state.postingComment = false;
        this.state.comment_type = [];
      }

      componentDidMount() {
          if (this.props.type == 'maintenance') {
            this.MaintenanceComments()
          } else if (this.props.type == 'bill') {
            this.BillComments()
          } else if (this.props.type == 'task') {
              this.TaskComments();
          } else if (this.props.type == 'discussion') {
            this.DiscussionComments();
          } else {
            this.PaymentComments();
          }
      }

    PaymentComments() {
        let itemId = this.props.item.id;
        fetch('/api/v1/payments/comments/'+itemId,{
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
                comment_type: 1,
              });
          });
    }

    BillComments() {
        let itemId = this.props.item.id;
        fetch('/api/v1/bills/comments/'+itemId,{
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
                comment_type: 0,
              });
          });
    }

    MaintenanceComments() {
        let itemId = this.props.item.id;
        fetch('/api/v1/maintenance/comments/'+itemId,{
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
                comment_type: 2,
              });
          });
    }

    TaskComments() {
        let itemId = this.props.item.id;
        fetch('/api/v1/tasks/comments/'+itemId,{
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
                comment_type: 4,
              });
          });
    }

    DiscussionComments() {
        let itemId = this.props.item.id;
        fetch('/api/v1/posts/comments/'+itemId,{
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
                comment_type: 5,
              });
          });
    }

    handleSubmit(event) {
        event.preventDefault();
        this.setState({postingComment: true})
        var submission = {
            comment: this.comment.value,
            comment_type: this.state.comment_type,
            item_id: this.props.item.id,
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
            return(
            <div class="scrollable comments">
            <ClipLoader
                color={'#00d1b2'} 
                loading={this.props.state.loadingComments }
                size='120' 
            />
            </div>     )
        } else {
            return (
                <div>
                    <div class="scrollable comments">
                    {this.state.comments.map((comment, index) => {
                        return(
                        <div>
                            <p>{comment.description}</p>
                            <p className="small">Posted by {comment.user.first_name} {moment(comment.created_at).startOf('hour').fromNow()}</p>
                            <hr />
                        </div>)
                        })}   
                    </div>          
                    <form onSubmit={this.handleSubmit.bind(this)}>
                        <div class="form-group">
                            <label for="amount">Comment</label>
                            <textarea  rows="3" type="textarea" ref={(input) => this.comment = input} value={this.amount} class="form-control" aria-describedby="amount" placeholder="Amount"/>
                        </div>         
                        
                            {this.state.postingComment ? 
                            <button class="btn btn-secondary" type="submit">
                                    <ClipLoader loading={this.state.postingComment}
                                    color={'white'} 
                                    size='20' />                         
                                </button>           
                                :                             
                                <button class="btn btn-secondary" type="submit">
                                    Post Comment
                                </button>           
                            }
                    </form>    
                </div>
            )
        }
    }
}