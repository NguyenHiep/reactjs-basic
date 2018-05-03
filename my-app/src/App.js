import React, { Component } from 'react';
import { createStore } from 'redux'
import { Provider } from 'react-redux'
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

import 'normalize.css/normalize.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.slim.min.js'
import 'popper.js/dist/popper.min.js'
import 'bootstrap/dist/js/bootstrap.min.js';

import Header from './component/include/header';
import Footer from './component/include/footer';

import LoginPage from './component/login/index.jsx';
import HomePage from './component/home/index';
class App extends Component {
  render() {
    return (
			<Router>
				<div className="wrapper">
					<Header/>
					<Route exact path="/" component={HomePage} />
					<Route path="/login" component={LoginPage} />
					<Footer/>
				</div>

			</Router>
    );
  }
}

export default App;
