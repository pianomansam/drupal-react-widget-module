import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';

const elements = document.getElementsByClassName('react-example');

for (let element of elements) {
  ReactDOM.render(
    <React.StrictMode>
      {/* <App data={JSON.parse(mount.dataset.drupal)} /> */}
      {/* <App data={drupalSettings.react_example} /> */}
      <App data={element.dataset.drupal} />
    </React.StrictMode>,
    element
  );
}

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
