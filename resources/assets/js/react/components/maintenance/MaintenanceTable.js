import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import Modal from './MaintenanceModal';
import MaintenanceForm from './MaintenanceForm'; 
import { Menu, Dropdown, Icon, Table, Divider, Popconfirm } from 'antd';
import Notification from '../Notification'


const floatButton = {
    float: 'right',
    'margin': '-60px 20px 10px 10px'
  }

  const onClick = function ({ key }) {
    alert(`Click on item ${key}`);
  };

  const menu = (
    <Menu onClick={onClick}>
      <Menu.Item key="0">
        <a  href="#">Mark as Complete</a>
      </Menu.Item>
      <Menu.Item key="1">
        <a >Edit Entry</a>
      </Menu.Item>
      <Menu.Divider />
      <Menu.Item key="3">Delete Item</Menu.Item>
    </Menu>
  );
 

/* An example React component */
class MaintenanceTable extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.state.showModal = false;
        this.state.modalMaintenance= [];
        this.state.showMaintenanceForm = false;
        this.props.state.loadingComments = true;
      }

      ShowDetails(data) {
        this.setState({
            showModal: true,
            modalMaintenance: data,
            loadingComments: true,
        })
    }

    ShowMaintenanceForm() {
        this.setState({
            showMaintenanceForm: true,
        })
    }

    CheckCompletion(data) {
        var input = [];
        if (data == 1) {
            input = <i class="fa fa-check"></i>;
        } else {
            input = <i class="fa fa-times"></i>;
        }
        return input;
    }

    MarkCompleted(item) {
        item.completed = 1;
        this.updateTask(item);
        Notification.openNotificationWithIcon('success','Marked as Completed');
        var requests = this.props.state.maintenance;
        requests[find(item)] = item;
        console.log(this.state.props.outstanding);
        this.setState({
            maintenance: this.requests,
            outstanding: this.props.state.outstanding +1
        })
    }

    MarkIncompleted(item) {
        item.completed = 0;
        this.updateTask(item);
        Notification.openNotificationWithIcon('success','Marked as Completed');
        var requests = this.props.state.maintenance;
        requests[find(item)] = item;
        this.setState({
            maintenance: this.requests
        })
    }

    updateTask(item) {
      fetch('/api/v1/maintenance/'+item.id,{
          method: 'PATCH',
          credentials: 'same-origin',
          headers: new Headers({
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          }),
          body: JSON.stringify(item)
        })
        .then(function(response) {
            return response.json();
        })
        .then(
          (myJson) => {
              console.log(myJson)
            this.setState({
              maintenance: this.props.state.maintenance.concat(myJson),
            });
        });
  }

    DeleteItem(item) {
        console.log(item.id);
      fetch('/api/v1/maintenance/'+item.id,{
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
                    maintenance: [...this.props.state.maintenance.slice(0, item.id), ...this.props.state.maintenance.slice(item.id+1)],
                  });
                  maintenance: [...this.props.state.maintenance.slice(0, item.id), ...this.props.state.maintenance.slice(item.id+1)];
                  $('.maintenanceTable #'+item.id).remove();
                  Notification.openNotificationWithIcon('success','Successfully Removed')
            } else {
                alert('Could not delete');
                Notification.openNotificationWithIcon('error','Could not Remove')

            }
              //this.setState({maintenance: this.myJson})
        });
  }

    render() {

        const onClick = function ({ key }) {
            alert(`Click on item ${key}`);
          };
        
          const menu = (
            <Menu>
              <Menu.Item key="0" onClick={this.MarkAsComplete}>
                <a  href="#">Mark as Complete</a>
              </Menu.Item>
              <Menu.Item key="1">
                <a >Edit Entry</a>
              </Menu.Item>
              <Menu.Divider />
              <Menu.Item key="3">Delete Item</Menu.Item>
            </Menu>
          );

        if (this.props.state.loading == true) {
            return(
                <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Maintenance</h4>
                        <p class="category">Here is where the maintenance requests are stored.</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                        <ClipLoader
                            color={'#00d1b2'} 
                            loading={this.props.state.loading }
                            size='120' 
                        />       
                        </table>

                    </div>
                </div>
            </div>
            )
        } else {
                return (
                    <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Maintenance</h4>
                            <p class="category">Here is where the maintenance requests are stored.</p>
                        </div>
                        <MaintenanceForm state={this.state} />
                        <div class="content table-responsive table-full-width">
                        <button style={floatButton} className="btn float-right" onClick={this.ShowMaintenanceForm.bind(this)}>New Request </button>
                            <table class="table table-hover maintenanceTabler">
                                <thead>
                                <th>ID</th>
                                <th>Tenant</th>
                                <th>Notes</th>
                                <th>Completed</th>
                                <th>Actions</th>
                                </thead>
                                <tbody class='maintenanceTable'>
                                    { this.props.state.maintenance.map((maintenance) => {
                                       return(
                                            <tr id={maintenance.id}>
                                            <td onClick={this.ShowDetails.bind(this, maintenance)}>{maintenance.id}</td>
                                            <td onClick={this.ShowDetails.bind(this, maintenance)}>{maintenance.user.first_name}</td>
                                            <td onClick={this.ShowDetails.bind(this, maintenance)}>{maintenance.notes}</td>
                                            <td onClick={this.ShowDetails.bind(this, maintenance)}>{ this.CheckCompletion(maintenance.completed )}</td>
                                            <td>
                                            <span>
                                                { maintenance.completed ? <a className="text-green"  href="javascript:;" onClick={this.MarkIncompleted.bind(this, maintenance)}>Mark Incomplete </a>
                                                    : <a className="text-green"  href="javascript:;" onClick={this.MarkCompleted.bind(this, maintenance)}>Mark Complete </a>}
                                                <Divider type="vertical" />
                                                <Popconfirm title="Sure to delete?" onConfirm={() => this.DeleteItem(maintenance)}>
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
                        </div>
                    </div>
                    <Modal state={this.state} maintenance={this.modalMaintenance}/>
                </div>
        );
    }
    }
}
 
export default MaintenanceTable;