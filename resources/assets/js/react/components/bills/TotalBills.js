import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
 
/* An example React component */
class TotalBills extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
      }

    render() {
        if (this.props.state.loadingBills == true) {
            return(
            <div class="col-md-3">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Total Bills</h4>
                    </div>
                    <div class="content">
                        <ClipLoader
                                color={'#00d1b2'} 
                                loading={this.props.state.loading}
                                size='120' 
                            />                      </div>
                </div>
            </div>
            )
        } else {
                return (
            <div class="col-md-3">
              <div class="card">
                  <div class="header">
                      <h4 class="title">Total Bills</h4>
                  </div>
                  <div class="content">
                      <h3>{this.props.state.totalBills.toFixed(2) }</h3>
                  </div>
              </div>
          </div>
        );
        }
    }
}
 
export default TotalBills;