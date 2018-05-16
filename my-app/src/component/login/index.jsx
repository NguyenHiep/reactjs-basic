import React from 'react';
import './index.css';
import axios from 'axios'

class Login extends React.Component {
  // State create
  constructor(props){
    super(props);
    this.state = {
    	username : '',
			password : '',
			remember : false
		};
    this.handleInputChange = this.handleInputChange.bind(this);
    this.handleSubmit      = this.handleSubmit.bind(this);
  }
  handleInputChange(event) {
  	const target   = event.target;
  	const password = target.password;
  	const username = target.username;
  	const remember = target.type === 'checkbox' ? target.checked : target.remember;
    this.setState({
			username : username,
			password : password,
			remember : remember
		});
  }
  
  handleSubmit(event) {
    alert('A name was submitted: ' + this.state.username + 'Pass:' + this.state.password + 'check:' + this.state.remember);
    event.preventDefault();
  }
	componentDidMount() {
		var baseURL = 'http://api.dev.nguyenhiep';
		const data = {
			grant_type: 'password',
			client_id: '1',
			client_secret: 'tMHBwB66egqRLXMmmxDNHEkQ2OeVyEc53nnyTV6Y',
			username: 'admin@gmail.com',
			password: 'admin123',
			scopes: []
		};

		axios.post(baseURL+'/oauth/token', data)
			.then(response => {
				console.log(response.data);
			})
			.catch (response => {
				// List errors on response...
			});
	}
	//https://lorenstewart.me/2016/10/31/react-js-forms-controlled-components/
  render() {
    return (
      <main id="content">
        <div className="container">
          <div className="row mb-3">
            <div className="col-xs-12 col-lg-6">
              <h1 className="title-body">Đăng nhập</h1>
              <form onSubmit={this.handleSubmit}>
                <div className="login-form">
                  <div className="form-group">
                    <label htmlFor="username">Tên đăng nhập / Email</label>
                    <input
											name="username"
											type="text"
											className="form-control"
											id="username"
											value={this.state.username}
											onChange={this.handleInputChange}/>
                  </div>
                  <div className="form-group">
                    <label htmlFor="pwd">Mật khẩu:</label>
                    <input
											name="password"
											type="password"
											className="form-control"
											id="pwd"
											value={this.state.password}
											onChange={this.handleInputChange}/>
                  </div>
                  <div className="form-group form-check">
                    <label className="form-check-label">
                      <input
												name="remember"
												type="checkbox"
												className="form-check-input"
												checked={this.state.remember}
												onChange={this.handleInputChange}/> Nhớ mật khẩu
                    </label>
                  </div>
                  <button type="submit" className="btn btn-primary">Đăng nhập</button>
                </div>
              </form>
							<p className="link-register"> Bạn chưa có tài khoản? <a href="/register"> Đăng ký ngay</a> / <a href="">Quên mật khẩu</a></p>
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

