import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import moment from 'moment';
import DiscussionForm from './DiscussionForm';
import DiscussionModal from './DiscussionModal';
import Notification from '../Notification'
import { Avatar,Menu, Dropdown, Icon, Table, Divider, Popconfirm } from 'antd';

 
/* An example React component */
class DiscussionsTable extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.state.showModal = false;
        this.props.state.loadingComments = true;
      }

      ShowDiscussionForm() {
        this.setState({
            showDiscussionForm: true,
        })
    }

      ShowDetails(data) {
        this.setState({
            showModal: true,
            modalDiscussion: data,
            loadingComments: true,
        })
    }

    DeleteItem(item) {
        this.DeleteDiscussion(item);
        Notification.openNotificationWithIcon('success','Successfuly Removed');
    }

    DeleteDiscussion(data) {
        fetch('/api/v1/posts/'+data.id,{
            method: 'DELETE',
            credentials: 'same-origin',
            headers: new Headers({
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }),
          })
          .then(function(response) {
              return response.json();
          })
          .then(
            (myJson) => {
              $('.discussionsTable #'+data.id).remove();
              this.setState({
                discussions: this.props.state.discussions.concat(myJson),
              });
          });
    }

    render() {
        if (this.props.state.loadingPosts == true) {
            return(
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Discussions</h4>
                            <p class="category">Overview of your homes tasks and todos</p>
                        </div>
                        <div class="content">
                            <table class="table table-hover">
                                <ClipLoader
                                    color={'#00d1b2'} 
                                    loading={this.props.state.loading }
                                    size='120' 
                                />      
                                    
                            </table>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )
        } else {
                return (
                <div class="col-md-8">
                    <div class="card">
                    <DiscussionForm state={this.state} />
                        <div class="header">
                            <h4 class="title">Discussions</h4>
                            <p class="category">Overview of your homes tasks and todos</p>
                        </div>
                        <div class="content">
                        <button className="btn float-right float-button" onClick={this.ShowDiscussionForm.bind(this)}>New Topic </button>
                            <table class="table table-hover">
                                <thead>
                                    <th>Active</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Time</th>
                                    <th></th>
                                </thead>
                                <tbody id="discussionsTable">
                                { this.props.state.discussions.map((post) => {
                                       return(
                                        <tr id={post.id}>
                                            <td onClick={this.ShowDetails.bind(this, post)}>
                                            <Avatar style={{ backgroundColor: '#00d1b2', verticalAlign: 'middle' }} size="large">
                                                {post.user.first_name}
                                            </Avatar></td>
                                            <td onClick={this.ShowDetails.bind(this, post)}>{post.title} </td>
                                            <td onClick={this.ShowDetails.bind(this, post)}>{post.description}</td>
                                            <td onClick={this.ShowDetails.bind(this, post)}>{moment(post.created_at).fromNow()}</td>
                                            <td>                                                
                                                <Popconfirm title="Sure to delete?" onConfirm={() => this.DeleteItem(post)}>
                                                    <a  className="text-green" href="javascript:;">Delete</a>
                                                </Popconfirm></td>
                                        </tr>
                                    )
                                })
                            }
                                </tbody>
                            </table>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <DiscussionModal state={this.state} discussion={this.modalDiscussion} />
                </div>
        );
        }
    }
}
 
export default DiscussionsTable;
