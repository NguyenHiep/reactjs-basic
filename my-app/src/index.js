import React from 'react';
import { render } from 'react-dom';
import { createStore } from 'redux'
import { Provider } from 'react-redux'
/*import reducer from './reducers'*/

import 'normalize.css/normalize.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.slim.min.js'
import 'popper.js/dist/popper.min.js'
import 'bootstrap/dist/js/bootstrap.min.js';


import registerServiceWorker from './registerServiceWorker';
/*import Home from './component/home/index'*/

import LoginPage from './component/login/index.jsx';
import HomePage from './component/home/index';
import { Switch, Route } from 'react-router-dom'
import { BrowserRouter } from 'react-router-dom';

const Roster = () => (
  <Switch>
      <Route path='/' component={HomePage} />
      <Route path="/login" component={LoginPage} />
  </Switch>
)
render(
  <BrowserRouter>
      <Roster/>
</BrowserRouter>, document.getElementById('root'));
registerServiceWorker();