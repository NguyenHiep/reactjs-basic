import React from 'react';
import './index.css';
import Header from "../include/header";
import SidebarHome from "../include/sidebarhome";
import Footer from "../include/footer";
import SliderHome from "../include/slider";

class Home extends React.Component {
	render() {
		return (
			<div className="wrapper">
				<Header/>
				<SliderHome/>
				<main id="content">
					<div className="container">
						<div className="row">
							{/*<Sidebar/>*/}
							<article className="col-12">
						</article>
							<div className="col-8">
								<h3 className="title-body">Truyện mới đăng</h3>
								<div className="row">
									<div className="col-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Eiyuu-no-Musume-to-Shite-Umarekawatta-Eiyuu-wa-Futatabi-Eiyuu-o-Mezasu" className="tooltips">
													<img src="http://cdn.truyentranh.net/upload/image/comic/20180425/Eiyuu-no-Musume-to-Shite-Umarekawatta-Eiyuu-wa-Futatabi-Eiyuu-o-Mezasu-5ae020c1e7e15-thumbnail-176x264.jpg" alt="god" className="media-object" />
													<span>
													 <img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout" />
													 <p className="description">
														 <strong>Tên khác:</strong> 英雄 の 娘 として 生まれ変わっ た 英雄 <br/>
														 <strong>Thể loại: </strong> Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy  <br/>
														 <strong>Tác giả:</strong> Akita Hika,Kotodera Amane,Kaburagi Haruka <br/>
														 <strong>Nội dung:</strong> Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chết vì cứu một đứa trẻ, ... <br/>
													 </p>
												 </span>
												</a>
											</div>

											<div className="media-body"><a href="http://truyentranh.net/Eiyuu-no-Musume-to-Shite-Umarekawatta-Eiyuu-wa-Futatabi-Eiyuu-o-Mezasu">
												<h4 className="manga-newest">Eiyuu no Musume to Shite ...</h4>
											</a>
												<p className="description">
													<span>Tên khác:</span> 英雄 の 娘 として ... <br/>
													<span>Thể loại:</span> <a href="http://truyentranh.net/the-loai/Slice-of-Life.34.html" title="Slice of Life" className="CateName">Slice of Life</a>, <a href="http://truyentranh.net/the-loai/Shoujo-Ai.31.html" title="Shoujo Ai" className="CateName">Shoujo Ai</a>, <a href="http://truyentranh.net/the-loai/Gender-bender.12.html" title="Gender bender" className="CateName">Gender bender</a>, <a href="http://truyentranh.net/the-loai/Fantasy.11.html" title="Fantasy" className="CateName">Fantasy</a>, <a href="http://truyentranh.net/the-loai/Comedy.5.html" title="Comedy" className="CateName">Comedy</a> <br/>
													<span>Tác giả:</span> Akita Hika,Kotodera Amane,Kaburagi Haruka <br/>
													<strong>Nội dung:</strong> Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chết ...</p>
											</div>
										</div>
									</div> {/* end .row */}
									<div className="col-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Eiyuu-no-Musume-to-Shite-Umarekawatta-Eiyuu-wa-Futatabi-Eiyuu-o-Mezasu" className="tooltips">
													<img src="http://cdn.truyentranh.net/upload/image/comic/20180425/Eiyuu-no-Musume-to-Shite-Umarekawatta-Eiyuu-wa-Futatabi-Eiyuu-o-Mezasu-5ae020c1e7e15-thumbnail-176x264.jpg" alt="god" className="media-object" />
													<span>
													 <img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout" />
													 <p className="description">
														 <strong>Tên khác:</strong> 英雄 の 娘 として 生まれ変わっ た 英雄 <br/>
														 <strong>Thể loại: </strong> Slice of Life, Shoujo Ai, Gender bender, Fantasy, Comedy  <br/>
														 <strong>Tác giả:</strong> Akita Hika,Kotodera Amane,Kaburagi Haruka <br/>
														 <strong>Nội dung:</strong> Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chết vì cứu một đứa trẻ, ... <br/>
													 </p>
												 </span>
												</a>
											</div>

											<div className="media-body"><a href="http://truyentranh.net/Eiyuu-no-Musume-to-Shite-Umarekawatta-Eiyuu-wa-Futatabi-Eiyuu-o-Mezasu">
												<h4 className="manga-newest">Eiyuu no Musume to Shite ...</h4>
											</a>
												<p className="description">
													<span>Tên khác:</span> 英雄 の 娘 として ... <br/>
													<span>Thể loại:</span> <a href="http://truyentranh.net/the-loai/Slice-of-Life.34.html" title="Slice of Life" className="CateName">Slice of Life</a>, <a href="http://truyentranh.net/the-loai/Shoujo-Ai.31.html" title="Shoujo Ai" className="CateName">Shoujo Ai</a>, <a href="http://truyentranh.net/the-loai/Gender-bender.12.html" title="Gender bender" className="CateName">Gender bender</a>, <a href="http://truyentranh.net/the-loai/Fantasy.11.html" title="Fantasy" className="CateName">Fantasy</a>, <a href="http://truyentranh.net/the-loai/Comedy.5.html" title="Comedy" className="CateName">Comedy</a> <br/>
													<span>Tác giả:</span> Akita Hika,Kotodera Amane,Kaburagi Haruka <br/>
													<strong>Nội dung:</strong> Reid, một trong 6 vị anh hùng giải cứu thế giới, sau khi chết ...</p>
											</div>
										</div>
									</div> {/* end .row */}
								</div> {/* end truyện mới đăng */}
								<h3 className="title-body">Truyện mới nhất</h3>
								<div className="row">
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg" alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-6 col-sm-6">
										<div className="media mainpage-manga">
											<div className="media-left cover-manga">
												<a href="http://truyentranh.net/Quy-Sai" className="tooltips">
													<img
														src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg"
														alt="opm" className="media-object"/>
													<span>
														<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
														<p className="description">
															<strong>Tên khác:</strong> Quỷ Sai                                          <br />
															<strong>Thể loại: </strong> Manhua                                          <br />
															<strong>Tác giả:</strong> Đang Cập Nhật...                                          <br />
															<strong>Nội dung:</strong> Chết đi không phải là kết thúc, mà là một bắt đầu mới. Linh hồn được quỷ sai ...
														</p>
              						</span>
												</a>
											</div>
											<div className="media-body">
												<a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai" data-tt="#truyenmoi-31347">
													<h4 className="manga-newest">Quỷ Sai</h4>
												</a>
												<div className="row">
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="latest-chap" href="http://truyentranh.net/Quy-Sai/Chap-023" target="_blank"
																 title="Quỷ Sai Chap 023">Chap 023</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-022" target="_blank"
																 title="Quỷ Sai Chap 022">Chap 022</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-021" target="_blank"
																 title="Quỷ Sai Chap 021">Chap 021</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-020" target="_blank"
																 title="Quỷ Sai Chap 020">Chap 020</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list">
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-019" target="_blank" title="Quỷ Sai Chap 019">Chap 019</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-018" target="_blank" title="Quỷ Sai Chap 018">Chap 018</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-017" target="_blank" title="Quỷ Sai Chap 017">Chap 017</a>
															<br />
															<a className="older-chap" href="http://truyentranh.net/Quy-Sai/Chap-016" target="_blank" title="Quỷ Sai Chap 016">Chap 016</a>
															<br />
														</div>
													</div>
													<div className="col-xs-6">
														<div className="hotup-list"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div className="col-md-12">
										<div className="viewmore-button">
											<a href="http://truyentranh.net/danh-sach.tmoinhat.html">Xem thêm
												<i className="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div className="col-4">
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
export default Home;

