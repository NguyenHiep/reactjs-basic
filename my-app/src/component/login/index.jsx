import React from 'react';
import './index.css';
import axios from 'axios'

class Login extends React.Component {
  // State create
  constructor(props){
    super(props);
    this.state = {
      fields: {
        username : '',
        password : '',
        remember : false,
      },
      errors: {}
		};
    this.handleInputChange = this.handleInputChange.bind(this);
    this.handleSubmit      = this.handleSubmit.bind(this);
    this.handleValidation  = this.handleValidation.bind(this);
  }
  handleValidation(){
    let fields = this.state.fields;
    let errors = {};
    let formIsValid = true;
  
    //Email
    if(typeof fields.username !== "undefined"){
      let lastAtPos  = fields.username.lastIndexOf('@');
      let lastDotPos = fields.username.lastIndexOf('.');
    
      if (!(lastAtPos < lastDotPos && lastAtPos > 0 && fields.username.indexOf('@@') == -1 && lastDotPos > 2 && (fields.username.length - lastDotPos) > 2)) {
        formIsValid = false;
        errors.username = "Định dạng email không đúng";
      }
    }
    if(!fields.username){
      formIsValid = false;
      errors.username = "Vui lòng nhập tên đăng nhập";
    }
    
    //Password
    if(typeof fields.password !== "undefined"){
      if(!fields.password.match(/^[a-zA-Z0-9]+$/)){
        formIsValid = false;
        errors.password = "Tên đăng nhập chỉ chứa các ký tự chữ và số";
      }
    }
    if(fields.password.length === 0){
      formIsValid = false;
      errors.password = "Vui lòng nhập mật khẩu";
    }
  
    this.setState({errors: errors});
    return formIsValid;
  }
  
  handleInputChange(event) {
    const target = event.target;
    const name = target.name;
    const value = target.type === 'checkbox' ? target.checked : target.value;
    let fields = this.state.fields;
    fields[name] = value;
    this.setState({fields});
  }
  
  handleSubmit(event) {
    event.preventDefault();
    // Validate true is execute
    if(this.handleValidation()){
      var baseURL = 'http://api.dev.nguyenhiep';
      const data = {
        client_id: '1',
        client_secret: 'tMHBwB66egqRLXMmmxDNHEkQ2OeVyEc53nnyTV6Y',
        grant_type: 'password',
        username: this.state.fields.username,
        password: this.state.fields.password,
      };
  
      axios.post(baseURL+'/oauth/token', data)
      .then(response => {
        //console.log(response.data);
        this.props.history.push('/')
      })
      .catch (response => {
        // List errors on response...
        let errors = {};
        let fields = this.state.fields;
        errors.message = "Tài khoản mật khẩu không đúng";
        fields.password = '';
        this.setState({errors: errors});
        this.setState({fields});
      });
    }
  }
  
  render() {
    return (
      <main id="content">
        <div className="container">
          <div className="row mb-3">
            <div className="col-xs-12 col-lg-6">
              <h1 className="title-body">Đăng nhập</h1>
              <form onSubmit={this.handleSubmit}>
                <span style={{color: "red"}} className="text-center">{this.state.errors.message}</span>
                <div className="login-form">
                  <div className="form-group">
                    <label htmlFor="username">Tên đăng nhập / Email</label>
                    <input
											name="username"
											type="text"
											className="form-control"
											id="username"
											value={this.state.fields.username}
											onChange={this.handleInputChange}/>
                    <span style={{color: "red"}}>{this.state.errors.username}</span>
                  </div>
                  <div className="form-group">
                    <label htmlFor="pwd">Mật khẩu:</label>
                    <input
											name="password"
											type="password"
											className="form-control"
											id="pwd"
											value={this.state.fields.password}
											onChange={this.handleInputChange}/>
                    <span style={{color: "red"}}>{this.state.errors.password}</span>
                  </div>
                  <div className="form-group form-check">
                    <label className="form-check-label">
                      <input
												name="remember"
												type="checkbox"
												className="form-check-input"
												checked={this.state.fields.remember}
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

