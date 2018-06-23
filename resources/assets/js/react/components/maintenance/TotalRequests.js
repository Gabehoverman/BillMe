import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
 
/* An example React component */
class TotalRequests extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
      }

    render() {
        if (this.props.state.loading == true) {
            return(
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Maintenance Requests</h4>
                    </div>
                    <div class="content">
                        <ClipLoader
                            color={'#00d1b2'} 
                            loading={this.props.state.loading}
                            size='120' 
                        />                    
                    </div>
                </div>
            </div>
            )
        } else {
                return (
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Maintenance Requests</h4>
                    </div>
                    <div class="content">
                        <h3>{ this.props.state.outstanding }</h3>
                    </div>
                </div>
            </div>
        );
    }
    }
}
 
export default TotalRequests;