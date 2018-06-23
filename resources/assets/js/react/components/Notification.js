import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Button, notification } from 'antd';

 
/* An example React component */
export default class Notification extends React.Component {

    
  static openNotificationWithIcon(type, message)  {    
    notification[type]({
      message: message,
      description: 'Your action was completed successfully!',
    });
  };

    render() {

        const onClose = function (e) {
            console.log(e, 'I was closed.');
          };

        return (
            <div>
              <Button onClick={() => openNotificationWithIcon('success')}>Success</Button>
              <Button onClick={() => openNotificationWithIcon('info')}>Info</Button>
              <Button onClick={() => openNotificationWithIcon('warning')}>Warning</Button>
              <Button onClick={() => openNotificationWithIcon('error')}>Error</Button>
            </div>
        );
    }
}