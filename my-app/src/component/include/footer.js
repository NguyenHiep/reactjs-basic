import React from 'react';

class Footer extends React.Component {
	render() {
		return (
			<footer className="footer">
				<div className="container">
					<div className="row">
						<div className="col-md-12">
							<div className="footercontainer">
								<div className="row">
									<div className="col-md-6">
										<div className="row">
											<div className="col-md-3">
												<div className="vechai-icon"><a href="http://truyentranh.net"><img src="http://cdn.truyentranh.net/frontend/images/logo_2.png" alt="Đọc truyện tranh online | TruyenTranh.net" /></a></div>
											</div>
											<div className="col-md-9">
												<p className="vechai-intro"><span>TruyenTranh.net</span> là điểm kết nối giữa các team dịch truyện với Fan truyện tranh trên toàn Việt Nam, hoạt động hoàn toàn miễn phí.</p>
											</div>
										</div>
									</div>
									<div className="col-md-6">
										<div className="row">
											<div className="col-xs-12 col-sm-6 col-md-6">
												<div className="social-icon"><a href="https://www.facebook.com/truyentranh/" target="_blank"><img src="http://cdn.truyentranh.net/frontend/images/fbicon.png" alt="Facebook" /></a><a href="skype:vechai.comic"><img src="http://cdn.truyentranh.net/frontend/images/skypeicon.png" alt="skype" /></a><a href="mailto:vechaicomic@gmail.com"><img src="http://cdn.truyentranh.net/frontend/images/mailicon.png" alt="mail" /><span>
                      vechaicomic@gmail.com</span></a></div>
											</div>
											<div className="col-xs-12 col-sm-6 col-md-6">
												<div className="app-download">
													<a href="https://itunes.apple.com/us/app/truyen-tranh-new/id1111479735?l=vi&ls=1&mt=8" target="_blank" title="Tải ứng dụng đọc truyện tranh trên Android">
														<img src="http://cdn.truyentranh.net/frontend/images/applqc.png" alt="vechaiapp" />
													</a>
													<a href="http://android.hipstore.mobi/app?Package=com.hipvn.android.vechaitruyen" target="_blank" title="Tải ứng dụng đọc truyện tranh trên Android">
														<img src="http://cdn.truyentranh.net/frontend/images/chplayqc.png" alt="vechaiapp" />
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</footer>
		);
	}
}
export default Footer;
