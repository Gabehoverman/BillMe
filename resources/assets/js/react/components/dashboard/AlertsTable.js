import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import moment from 'moment';
 
/* An example React component */
class AlertsTable extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
      }

    render() {
        if (this.props.state.loadingAlerts == true) {
            return(
                <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Recent Activity</h4>
                        <p class="category">Everything that's happening in your house.</p>
                    </div>
                    <div class="content">
                        <div class="table-full-width">
                            <table class="table">
                                <ClipLoader
                                    color={'#00d1b2'} 
                                    loading={this.props.state.loading }
                                    size='120' 
                                />  
                            </table>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Updated 3 minutes ago.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            )
        } else {
                return (
                    <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Recent Activity</h4>
                            <p class="category">Everything that's happening in your house.</p>
                        </div>
                        <div class="content">
                            <div class="table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Details</th>
                                        <th>Time</th>
                                    </thead>
                                    <tbody>
                                    { this.props.state.alerts.map((alert) => {
                                       return(
                                           <tr>
                                                <td>{alert.user.first_name +' '+ alert.notes}</td>
                                                <td>{moment(alert.created_at).fromNow()}</td>
                                                <td><i class="fa fa-ellipsis-h"></i></td>
                                            </tr>
                                    )
                                })
                            }
                                    </tbody>
                                </table>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fa fa-clock-o"></i> Updated 3 minutes ago.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        );
        }
    }
}
 
export default AlertsTable;