import React from 'react';
import logo from '../../assets/img/logo.png';

class Header extends React.Component {
	render() {
		return (
			<header className="header">
				<div className="container">
					<div className="row">
						<nav className="navbar navbar-expand-lg navbar-light bg-light col-12">
							<a className="navbar-brand"><img src={logo} /></a>
							<button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span className="navbar-toggler-icon"></span>
							</button>

							<div className="collapse navbar-collapse" id="navbarSupportedContent">
								<ul className="navbar-nav mr-auto">
									<li className="nav-item active">
										<a className="nav-link">Trang chủ <span className="sr-only">(current)</span></a>
									</li>
									<li className="nav-item">
										<a className="nav-link">List truyện</a>
									</li>
									<li className="nav-item dropdown">
										<a className="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Thể loại
										</a>
										<div className="dropdown-menu" aria-labelledby="navbarDropdown">
											<a className="dropdown-item">Action</a>
											<a className="dropdown-item">Another action</a>
											<div className="dropdown-divider"></div>
											<a className="dropdown-item">Something else here</a>
										</div>
									</li>
									<li className="nav-item"><a className="nav-link">Blog</a></li>
									<li className="nav-item"><a className="nav-link">Hay nhức nhói</a></li>
								</ul>
								<form className="form-inline my-2 my-lg-0">
									<input className="form-control mr-sm-2" type="search" placeholder="Nhập từ khóa" aria-label="Search" />
									<button className="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
								</form>
							</div>
						</nav>
					</div>
					<div className="row">
						<div className="col">
							<div className="post-stick"><a>One piece chap 902 TVcd</a></div>
						</div>
						<div className="col">
							<div className="post-stick"><a>One piece chap 902 TVcd</a></div>
						</div>
						<div className="col">
							<div className="post-stick"><a>One piece chap 902 TVcd</a></div>
						</div>
					</div>
				</div>
			</header>
		);
	}
}
export default Header;
