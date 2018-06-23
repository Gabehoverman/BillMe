import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import AlertsTable from '../components/dashboard/AlertsTable';
import MaintenanceTable from '../components/dashboard/MaintenanceTable';
import TasksTable from '../components/tasks/TasksTable';
 
/* An example React component */
export default class Dashboard extends Component {

    constructor(props) {
        super(props);
    
        this.state = {
            bills: [],
            alerts: [],
            maintenance: [],
            tasks: [],
            loadingBills: true,
            loadingAlerts: true,
            loadingMaintenance: true,
            loadingTasks: true,
        };
      }

    componentDidMount() {
        this.BillsData();
        this.AlertsData();
        this.MaintenanceData();
        this.TasksData();
      }

    BillsData() {
        fetch('/api/v1/bills',{
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
              this.setState({
                bills: myJson,
                loadingBills: false,
              });
          });
    }

    AlertsData() {
        fetch('/api/v1/alerts',{
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
              this.setState({
                alerts: myJson,
                loadingAlerts: false,
              });
          });
    }

    MaintenanceData() {
        fetch('/api/v1/maintenance',{
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
              this.setState({
                maintenance: myJson,
                loadingMaintenance: false,
              });
          });
    }

    TasksData() {
        fetch('/api/v1/tasks',{
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
              this.setState({
                tasks: myJson,
                loadingTasks: false,
              });
          });
    }


    render() {
        return (
        <div class='container-fluid'>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Bills</h4>
                            <p class="category">Overview of bills and payments</p>
                        </div>
                        <div class="content">
                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-green"></i> Billed
                                    <i class="fa fa-circle text-silver"></i> Paid
                                </div>
                                <hr />
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <AlertsTable state={this.state} />
            </div>



            <div class="row">
                <div class="col-md-6">
                    <TasksTable state={this.state}/>
                </div>

               <MaintenanceTable state={this.state} />
	        </div>
        </div>
        );
    }
}
  