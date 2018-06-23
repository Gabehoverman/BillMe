import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import moment from 'moment';
import { Menu, Dropdown, Icon, Table, Divider, Popconfirm } from 'antd';
import Notification from '../Notification'
import TaskForm from './TaskForm';
import TaskModal from './TaskModal';
 
/* An example React component */
class TasksTable extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.state.showModal = false;
        this.props.state.loadingComments = true;
      }

      ShowDetails(data) {
        this.setState({
            showModal: true,
            modalTask: data,
            loadingComments: true,
        })
    }

    CheckCompletion(data) {
        var input = [];
        if (data == 1) {
            input = <i class="fa fa-check-circle text-green table-icon"></i>;
        } else {
            input = <i class="fa fa-times-circle text-gray table-icon"></i>;
        }
        return input;
    }

    MarkCompleted(task) {
        task.completed = 1;
        this.updateTask(task);
        Notification.openNotificationWithIcon('success','Marked as Completed');
        var tasks = this.props.state.tasks;
        tasks[find(task)] = task;
        this.setState({
            tasks: this.tasks
            
        })
    }

    MarkIncompleted(task) {
        task.completed = 0;
        this.updateTask(task);
        Notification.openNotificationWithIcon('success','Marked as Incomplete');
        console.log(task);
        var tasks = this.props.state.tasks;
        tasks[find(task)] = task;
        this.setState({
            tasks: this.tasks
        })
    }

    updateTask(task) {
      fetch('/api/v1/tasks/'+task.id,{
          method: 'PATCH',
          credentials: 'same-origin',
          headers: new Headers({
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          }),
          body: JSON.stringify(task)
        })
        .then(function(response) {
            return response.json();
        })
        .then(
          (myJson) => {
              console.log(myJson)
            this.setState({
              tasks: this.props.state.tasks.concat(myJson),
            });
        });
  }

    DeleteItem(item) {
        this.DeleteTask(item);
        Notification.openNotificationWithIcon('success','Successfuly Removed');
    }

    DeleteTask(task) {
        fetch('/api/v1/tasks/'+task.id,{
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
              $('.tasksTable #'+task.id).remove();
              this.setState({
                tasks: this.props.state.tasks.concat(myJson),
              });
          });
    }

    ShowTaskForm() {
        this.setState({
            showTaskForm: true,
        })
    }
      

    render() {

        const floatButton = {
            float: 'right',
            'margin': '-60px 20px 10px 10px'
          }

        if (this.props.state.loadingTasks == true) {
            return(
                     <div class="card">
                        <div class="header">
                            <h4 class="title">Tasks & Todos</h4>
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
                                <div class="legend">
                                    <i class="fa fa-circle text-green"></i> Complete
                                    <i class="fa fa-circle text-black"></i> Incomplete
                                </div>
                                <hr />
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
            )
        } else {
                return (
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Tasks & Todos</h4>
                            <p class="category">Overview of your homes tasks and todos</p>
                        </div>
                        <TaskForm state={this.state} />
                        <div class="content">
                        <button style={floatButton} className="btn float-right" onClick={this.ShowTaskForm.bind(this)}>Add Task </button>
                            <table class="table table-hover">
                                <thead>
                                    <th>Active</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Time</th>
                                    <th></th>            
                                </thead>
                                <tbody className='tasksTable'>

                                { this.props.state.tasks.map((task) => {
                                       return(
                                            <tr id={task.id}>
                                                <td>
                                                    { task.completed ? <i class="fa fa-check-circle text-green table-icon"></i> 
                                                    : <i class="fa fa-times-circle text-gray table-icon"></i>}
                                                </td>
                                                <td onClick={this.ShowDetails.bind(this, task)} >{task.title} </td>
                                                <td onClick={this.ShowDetails.bind(this, task)}>{task.description}</td>
                                                <td onClick={this.ShowDetails.bind(this, task)}>{moment(task.created_at).fromNow()}</td>
                                                <td>
                                                <span>
                                                { task.completed ? <a className="text-green"  href="javascript:;" onClick={this.MarkIncompleted.bind(this, task)}>Mark Incomplete </a>
                                                    : <a className="text-green"  href="javascript:;" onClick={this.MarkCompleted.bind(this, task)}>Mark Complete </a>}
                                                <Divider type="vertical" />
                                                <Popconfirm title="Sure to delete?" onConfirm={() => this.DeleteItem(task)}>
                                                    <a  className="text-green" href="javascript:;">Delete</a>
                                                </Popconfirm>
                                                </span>
                                                </td>                                              
                                                </tr>
                                    )
                                })
                             }
                                </tbody>
                            </table>
                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-green"></i> Complete
                                    <i class="fa fa-circle text-black"></i> Incomplete
                                </div>
                                <hr />
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                        <TaskModal state={this.state} task={this.modalTask}/>
                    </div>
            );
        }
    }
}
 
export default TasksTable;