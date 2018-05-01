import React from 'react';
import logo from '../../assets/img/logo.png';
import 'normalize.css/normalize.css'

class Header extends React.Component {
	render() {
		let posts_stick = [
			{
				id : 1,
				title : 'ONE PIECE CHAP 903 TV',
				url : 'http://truyentranh.net/one-piece/Chap-9035',
				color: '#8A0829'
			},
			{
				id : 2,
				title : 'ONE-PUNCH MAN CHAP 132',
				url : 'http://truyentranh.net/onepunch-man/Chap-132',
				color: '#A901DB'
			},
			{
				id : 3,
				title : 'HIỆP KHÁCH GIANG HỒ CHAP 545 RAW',
				url : 'http://truyentranh.net/hiep-khach-giang-ho/Chap-545',
				color: '#8A0886'
			}
		];
		let elements_post_stick = posts_stick.map((post_slick, index) => {
			return <div className="post-stick" key={post_slick.id}><a href={post_slick.url} title={post_slick.title}>{post_slick.title}</a></div>
		});
		return (
			<div>
				<header className="header">
					<div className="container">
						<div className="row">
							<nav className="navbar navbar-expand-lg navbar-light col-12">
								<a className="navbar-brand"><img src={logo} /></a>
								<button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span className="navbar-toggler-icon"></span>
								</button>

								<div className="collapse navbar-collapse" id="navbarSupportedContent">
									<ul className="navbar-nav mr-auto">
										<li className="nav-item active">
											<a className="nav-link">Trang chủ <span className="sr-only"></span></a>
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
										<input className="form-control mr-sm-2" type="search" placeholder="Tìm kiếm truyện" aria-label="Search" />
										<button className="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
									</form>
								</div>
							</nav>
						</div>
					</div>
				</header>
				<section className="bg-post-stick">
					<div className="container">
						<div className="row">
							<div className="col-12">
								{elements_post_stick}
							</div>
						</div>
					</div>
				</section>
			</div>
		);
	}
}
export default Header;
