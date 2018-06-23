import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
 
/* An example React component */
class CompletedRequests extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        // this.state = {
        //     maintenance: [],
        //     loading: true,
        // };
      }

    componentDidMount() {
        //this.MaintenanceList();
      }

    MaintenanceList() {
        fetch('/api/v1/maintenance/completed',{
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
              let maintenance = myJson;
              console.log(maintenance);
              this.setState({
                maintenance: myJson,
                loading: false,
              });
                //this.setState({maintenance: this.myJson})
          });
    }

    render() {
        if (this.props.state.loading == true) {
            return(
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Completed Requests</h4>
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
                        <h4 class="title">Completed Requests</h4>
                    </div>
                    <div class="content">
                        <h3>{ this.props.state.completed }</h3>
                    </div>
                </div>
            </div>
        );
    }
    }
}
 
export default CompletedRequests;