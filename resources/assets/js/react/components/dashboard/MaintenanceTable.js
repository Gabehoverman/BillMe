import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
 
/* An example React component */
class MaintenanceTable extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
      }

    render() {
        if (this.props.state.loadingMaintenance == true) {
            return(
                <div class="col-md-6">
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
                    <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Maintenance</h4>
                            
    
                            <p class="category">Here is where the maintenance requests are stored.</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Tenant</th>
                                <th>Notes</th>
                                <th>Completed</th>
                                <th>Actions</th>
                                </thead>

                                    { this.props.state.maintenance.map((maintenance) => {
                                       return(
                                        <tbody>
                                            <tr id="{{ $m->id }}">
                                            <td>{maintenance.id}</td>
                                            <td>{maintenance.user.first_name}</td>
                                            <td>{maintenance.notes}</td>
                                                <td><i class="fa fa-check"></i></td>
                                            <td>
                                                    <div class="btn-group dropup">
                                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-info"></i>
                                                        </button>
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
                </div>
        );
    }
    }
}
 
export default MaintenanceTable;