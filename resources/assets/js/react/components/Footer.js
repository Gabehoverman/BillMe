import React, { Component } from 'react';
import ReactDOM from 'react-dom';
 
/* An example React component */
export default class Footer extends React.Component {
    render() {
        return (
            <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="dashboard">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="bills">
                                Bills
                            </a>
                        </li>
                        <li>
                            <a href="maintenance">
                                Maintenance
                            </a>
                        </li>
                        <li>
                            <a href="user">
                                Profile
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://gabehoverman.com">Gabe Hoverman</a>
                </p>
            </div>
        </footer>
        );
    }
}
 