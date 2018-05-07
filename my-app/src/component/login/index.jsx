import React from 'react';
import './index.css';
class Login extends React.Component {
  // State create
  constructor(props){
    super(props);
   
  }
  
  render() {
    return (
      <main id="content">
        <div className="container">
          <div className="row mb-3">
            <div className="col-xs-12 col-lg-6">
              <h1 className="title-body">Đăng nhập</h1>
              <div className="login-form">
                <div className="form-group">
                  <label htmlFor="email">Tên đăng nhập / Email</label>
                  <input type="email" className="form-control" id="email" />
                </div>
                <div className="form-group">
                  <label htmlFor="pwd">Mật khẩu:</label>
                  <input type="password" className="form-control" id="pwd" />
                </div>
                <div className="form-group form-check">
                  <label className="form-check-label">
                    <input className="form-check-input" type="checkbox" /> Nhớ mật khẩu
                  </label>
                </div>
                <button type="submit" className="btn btn-primary">Đăng nhập</button>
              </div>
            </div>
            <div className="col-xs-12 col-lg-6">
              <h2 className="title-body">Đăng nhập nhanh</h2>
              <div className="login-socical">
                <ul className="list-unstyled">
                  <li><a className="btn btn-facebook mb-2">Đăng nhập bằng facebook</a></li>
                  <li><a className="btn btn-google-plus mb-2">Đăng nhập bằng google plus</a></li>
                  <li><a className="btn btn-twitter mb-2">Đăng nhập bằng twitter</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </main>
    );
  }
}
export default Login;

