import React, {Component} from 'react';
import {BrowserRouter as Router, Route, Switch} from "react-router-dom";
import App from './App';
import LoginPage from './component/login/index';
import HomePage from './component/home/index';
import RegisterPage from './component/register/index';

class Routes extends Component {
  render() {
    return (
      <Router>
        <App>
          <Switch>
            <Route exact path="/" component={HomePage}/>
            <Route path="/login" component={LoginPage}/>
            <Route path="/register" component={RegisterPage}/>
            {/*<Route component={NoMatch} />*/}
          </Switch>
        </App>
      </Router>
    );
  }
}

export default Routes;
