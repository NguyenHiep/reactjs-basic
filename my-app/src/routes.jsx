import React, { Component } from 'react';
import { BrowserRouter as Router, Route, Link, Switch, Redirect } from "react-router-dom";
import App from './App';
import LoginPage from './component/login/index';
import HomePage from './component/home/index';

class RouterLink extends Component {
  render() {
    return (
      <Router>
        <App>
            <Switch>
              <Route exact path="/" component={HomePage} />
              <Route path="/login" component={LoginPage} />
              {/*<Route component={NoMatch} />*/}
            </Switch>
        </App>
      </Router>
    );
  }
}

export default RouterLink;
