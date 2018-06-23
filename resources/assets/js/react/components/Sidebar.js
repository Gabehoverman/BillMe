import React from "react";
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Link, NavLink, Redirect, Switch } from "react-router-dom";

export default class Sidebar extends React.Component {
    render() {
        return (
        <div class="sidebar-wrapper">
            <div class="p-10" >
                <NavLink to="/" className="logo-saas">
                    <img width="200px" src="../assets/img/housematelogosaas.png"/>
                </NavLink >
            </div>
            <ul class="nav">
                <li>
                    <NavLink to="/app/spa/dash" activeClassName="active-nav">
                        <i class="fa fa-trello"></i>
                        <p>Dashboard</p>
                    </NavLink>
                </li>
                <li>
                    <NavLink to="/app/spa/tasks"  activeClassName="active-nav">
                        <i class="fa fa-clipboard"></i>
                        <p>Tasks & Todo's</p>
                    </NavLink>
                </li>
                <li>
                    <NavLink to="/app/spa/bills">
                        <i class="fa fa-dollar"></i>
                        <p>Bills & Payments</p>
                    </NavLink >
                </li>
                <li>
                    <NavLink to="/app/spa/maintenance">
                        <i class="fa fa-wrench"></i>
                        <p>Maintenance</p>
                    </NavLink >
                </li>
                <li>
                    <NavLink to="/app/spa/discussions">
                        <i class="fa fa-comments"></i>
                        <p>Discussions</p>
                    </NavLink >
                </li>
                <li>
                    <NavLink to="/app/spa/house">
                        <i class="fa fa-home"></i>
                        <p>House</p>
                    </NavLink >
                </li>
                <li>
                    <NavLink to="/app/spa/profile">
                        <i class="fa fa-user"></i>
                        <p>User Profile</p>
                    </NavLink >
                </li>
                <li class="active-pro">
                    <NavLink to="upgrade.html">
                        <i class="fa fa-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </NavLink >
                </li>
            </ul>
        </div>
        )
    }
}