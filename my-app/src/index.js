import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux'
import { Provider } from 'react-redux'
/*import reducer from './reducers'*/

import 'normalize.css/normalize.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.slim.min.js'
import 'popper.js/dist/popper.min.js'
import 'bootstrap/dist/js/bootstrap.min.js';


import registerServiceWorker from './registerServiceWorker';
import Home from './component/home/index'

ReactDOM.render(<Home />, document.getElementById('root'));
registerServiceWorker();