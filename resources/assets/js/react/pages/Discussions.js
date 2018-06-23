import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import DiscussionsTable from '../components/discussions/DiscussionsTable';
import DiscussionsAlerts from '../components/discussions/DiscussionsAlerts';
 
/* An example React component */
export default class Discussions extends Component {

    constructor(props) {
        super(props);
    
        this.state = {
            discussions: [],
            discussionsAlerts: [],
            loadingPosts: true,
        };
      }

      componentDidMount() {
        this.DiscussionsData();
      }

      DiscussionsData() {
        fetch('/api/v1/posts/data',{
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
                discussions: myJson.Discussions,
                alerts: myJson.Alerts,
                loadingPosts: false,
              });
                //this.setState({maintenance: this.myJson})
          });
    }

    render() {
        return (
            <div class="container-fluid">
            <div class="row">
                <DiscussionsTable state={this.state} />
                <DiscussionsAlerts state={this.state} />
            </div>
        </div>
        );
    }
}