import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Link, NavLink, Redirect, Switch } from "react-router-dom";
import Sidebar from './components/Sidebar';
import Dashboard from './pages/Dashboard';
import Tasks from './pages/Tasks';
import Bills from './pages/Bills';
import Maintenance from './pages/Maintenance';
import Discussions from './pages/Discussions';
import House from './pages/House';
import Profile from './pages/Profile';
import Nav from './components/Nav';
import Footer from './components/Footer';

 class Index extends Component {

     render() {
         return (
            <Router>
                
			    <div className="wrapper">
                    <div className="sidebar" data-color="black">
                        <Sidebar />
                    </div>
                    <div class="main-panel">
                     <Nav />
                    <div className="content">

                        <Switch>               
                            <Route path="/app/spa/dash" default component={Dashboard} />
                            <Route path="/app/spa/tasks" component={Tasks} />
                            <Route path="/app/spa/bills"  component={Bills} />
                            <Route path="/app/spa/maintenance" component={Maintenance} />
                            <Route path="/app/spa/discussions"  component={Discussions} />
                            <Route path="/app/spa/house" component={House} />
                            <Route path="/app/spa/profile" component={Profile} />
                            <Redirect from="/app/spa" to="/app/spa/dash" />
                        </Switch>
                    </div>
                    <Footer />

                    </div>
                </div>
            </Router>
         );
     }
 }

 if (document.getElementById('app')) {
    ReactDOM.render(<Index />, document.getElementById('app'));
}