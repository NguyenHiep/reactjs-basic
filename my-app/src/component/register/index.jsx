import React from 'react';
import './index.css';
class Register extends React.Component {
  // State create
  constructor(props) {
    super(props);
    this.state = {value: ''}
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(event) {
    this.setState({value: event.target.value});
  }

  handleSubmit(event) {
    alert('A name was submitted: ' + this.state.value);
    event.preventDefault();
  }

  render() {
    return (
      <main id="content">
        <div className="container">
          <div className="row mb-3">
            <div className="col-xs-12 col-lg-6">
              <h1 className="title-body">Đăng ký tài khoản</h1>
              <form onSubmit={this.handleSubmit}>
                <div className="login-form">
                  <div className="form-group">
                    <label htmlFor="email">Email</label>
                    <input type="email" className="form-control" id="email" value={this.state.value}
                           onChange={this.handleChange} placeholder="VD: truyentranh@gmail.com"/>
                  </div>
                  <div className="form-group">
                    <label htmlFor="username">Tên đăng nhập</label>
                    <input type="username" className="form-control" id="username" value=""/>
                  </div>
                  <div className="form-group">
                    <label htmlFor="pwd">Mật khẩu:</label>
                    <input type="password" className="form-control" id="pwd"/>
                  </div>
                  <div className="form-group">
                    <label htmlFor="repwd">Nhập lại khẩu:</label>
                    <input type="password" className="form-control" id="repwd"/>
                  </div>
                  <button type="submit" className="btn btn-primary">Đăng ký</button>
                </div>
              </form>
              <p className="link-register"> Bạn có tài khoản rồi? <a href="/login"> Đăng nhập</a> / <a href="">Quên mật
                khẩu</a></p>
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
export default Register;

