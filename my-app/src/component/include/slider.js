import React,  { Component } from 'react';
import Slider from "react-slick/dist/react-slick.min.js";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

class SliderHome extends Component {
	render() {
		var settings = {
			dots: true,
			infinite: false,
			speed: 500,
			slidesToShow: 6,
			slidesToScroll: 6,
			initialSlide: 0,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
						initialSlide: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		};
		return (
			<div className="home-slider">
				<div className="container">
					<Slider {...settings}>
						<div>
							<a href=""><img src="http://cdn.truyentranh.net/upload/image/comic/20180320/Layers-of-Fear-5ab11540b2140-5ac9d77f26d8d-thumbnail-176x264.jpg" alt=""/></a>
							<h3><a href="">Nguyen Hiep</a></h3>
							<p><a href="">Nguyen HIep chap 002</a></p>
						</div>
						<div>
							<a href=""><img src="http://cdn.truyentranh.net/upload/image/comic/20180320/Layers-of-Fear-5ab11540b2140-5ac9d77f26d8d-thumbnail-176x264.jpg" alt=""/></a>
							<h3><a href="">Nguyen Hiep 2</a></h3>
							<p><a href="">Nguyen HIep chap 002</a></p>
						</div>
						<div>
							<a href=""><img src="http://cdn.truyentranh.net/upload/image/comic/20180320/Layers-of-Fear-5ab11540b2140-5ac9d77f26d8d-thumbnail-176x264.jpg" alt=""/></a>
							<h3><a href="">Nguyen Hiep 3</a></h3>
							<p><a href="">Nguyen HIep chap 002</a></p>
						</div>
						<div>
							<a href=""><img src="http://cdn.truyentranh.net/upload/image/comic/20180320/Layers-of-Fear-5ab11540b2140-5ac9d77f26d8d-thumbnail-176x264.jpg" alt=""/></a>
							<h3><a href="">Nguyen Hiep 4</a></h3>
							<p><a href="">Nguyen HIep chap 002</a></p>
						</div>
						<div>
							<a href=""><img src="http://cdn.truyentranh.net/upload/image/comic/20180320/Layers-of-Fear-5ab11540b2140-5ac9d77f26d8d-thumbnail-176x264.jpg" alt=""/></a>
							<h3><a href="">Nguyen Hiep 5</a></h3>
							<p><a href="">Nguyen HIep chap 002</a></p>
						</div>
						<div>
							<a href=""><img src="http://cdn.truyentranh.net/upload/image/comic/20180320/Layers-of-Fear-5ab11540b2140-5ac9d77f26d8d-thumbnail-176x264.jpg" alt=""/></a>
							<h3><a href="">Nguyen Hiep 6</a></h3>
							<p><a href="">Nguyen HIep chap 002</a></p>
						</div>
						<div>
							<a href=""><img src="http://cdn.truyentranh.net/upload/image/comic/20180320/Layers-of-Fear-5ab11540b2140-5ac9d77f26d8d-thumbnail-176x264.jpg" alt=""/></a>
							<h3><a href="">Nguyen Hiep 7</a></h3>
							<p><a href="">Nguyen HIep chap 002</a></p>
						</div>
						<div>
							<a href=""><img src="http://cdn.truyentranh.net/upload/image/comic/20180320/Layers-of-Fear-5ab11540b2140-5ac9d77f26d8d-thumbnail-176x264.jpg" alt=""/></a>
							<h3><a href="">Nguyen Hiep 8</a></h3>
							<p><a href="">Nguyen HIep chap 002</a></p>
						</div>
					</Slider>
				</div>
			</div>
		);
	}
}
export default SliderHome;
