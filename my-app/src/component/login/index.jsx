import React from 'react';
import Header from '../include/header';
import SidebarHome from '../include/sidebarhome';
import Footer from '../include/footer';

class Login extends React.Component {
  
  // State create
  constructor(props){
    super(props);
   
  }
  
  render() {
    return (
      <div className="wrapper">
        <Header/>
        <main id="content">
          <div className="container">
            <div className="row">
              <div className="col-xs-12 col-lg-8">
                  <h1>Login </h1>
              </div>
              <div className="col-xs-12 col-lg-4">
                <div className="row">
                  <div className="col-md-12">
                    <div className="history-read">
                      <p className="save-manga">
                        <a href="http://truyentranh.net/dang-nhap.html?ref=http%3A%2F%2Ftruyentranh.net%2F">
                          <img src="http://cdn.truyentranh.net/frontend/images/clockfix.png" /> Xem lịch sử đọc truyện của bạn</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div className="row">
                  <SidebarHome/>
                </div>
              </div>
            </div>
          </div>
        </main>
        <Footer/>
      </div>
    
    );
  }
}
export default Login;

