import React from 'react';
import { render } from 'react-dom';
import registerServiceWorker from './registerServiceWorker';
import RouterLink from './routes';
render(
  <RouterLink/>, document.getElementById('root'));
registerServiceWorker();