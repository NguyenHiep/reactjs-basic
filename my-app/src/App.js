import React, { Component } from 'react';
import { createStore } from 'redux'
import { Provider } from 'react-redux'

import 'normalize.css/normalize.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.slim.min.js'
import 'popper.js/dist/popper.min.js'
import 'bootstrap/dist/js/bootstrap.min.js';

import Header from './component/include/header';
import Footer from './component/include/footer';

class App extends Component {
  render() {
    return (
			<div className="wrapper">
				<Header/>
        { this.props.children}
				<Footer/>
			</div>
    );
  }
}

export default App;
