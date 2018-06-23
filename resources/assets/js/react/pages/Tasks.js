import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import TasksTable from '../components/tasks/TasksTable';
import TasksAlerts from '../components/tasks/TasksAlerts';
 
/* An example React component */
export default class Tasks extends Component {

    constructor(props) {
        super(props);
    
        this.state = {
            tasks: [],
            tasksAlerts: [],
            loadingTasks: true,
        };
      }

      componentDidMount() {
        this.TasksData();
      }

      TasksData() {
        fetch('/api/v1/tasks/data',{
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
                tasks: myJson.Tasks,
                alerts: myJson.Alerts,
                loadingTasks: false,
              });
                //this.setState({maintenance: this.myJson})
          });
    }

    render() {
        return (
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <TasksTable state={this.state} />
                </div>
            </div>
        </div>
        );
    }
}
 
/* The if statement is required so as to Render the component on pages that have a div with an ID of "root";  
*/