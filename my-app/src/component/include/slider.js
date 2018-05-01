import React,  { Component } from 'react';
import Slider from 'react-slick/dist/react-slick.min.js';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import Slider_Items from  '../home/slider_items.js'
class SliderHome extends Component {
	render() {
		var settings = {
			dots: false,
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
		var mangas   = [
			{
				id: 1,
				image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/Berserk-thumbnail-176x264.jpg',
				title: 'Berserk',
				chapter: 'Berserk Chap 354',
				url: 'http://truyentranh.net/Berserk',
				url_latest: 'http://truyentranh.net/Berserk/Chap-354',
				status: true
			},
			{
				id: 2,
				image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/Gintama-thumbnail-176x264.jpg',
				title: 'Gintama',
				chapter: 'Gintama Chap 653',
				url: 'http://truyentranh.net/Gintama',
				url_latest: 'http://truyentranh.net/Gintama/Chap-653',
				status: true
			},
			{
				id: 3,
				image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/Berserk-thumbnail-176x264.jpg',
				title: 'Berserk',
				chapter: 'Berserk Chap 354',
				url: 'http://truyentranh.net/Berserk',
				url_latest: 'http://truyentranh.net/Berserk/Chap-354',
				status: true
			},
			{
				id: 4,
				image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/Gintama-thumbnail-176x264.jpg',
				title: 'Gintama',
				chapter: 'Gintama Chap 653',
				url: 'http://truyentranh.net/Gintama',
				url_latest: 'http://truyentranh.net/Gintama/Chap-653',
				status: true
			},
			{
				id: 5,
				image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/Gintama-thumbnail-176x264.jpg',
				title: 'Gintama',
				chapter: 'Gintama Chap 653',
				url: 'http://truyentranh.net/Gintama',
				url_latest: 'http://truyentranh.net/Gintama/Chap-653',
				status: true
			},
			{
				id: 6,
				image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/Gintama-thumbnail-176x264.jpg',
				title: 'Gintama',
				chapter: 'Gintama Chap 653',
				url: 'http://truyentranh.net/Gintama',
				url_latest: 'http://truyentranh.net/Gintama/Chap-653',
				status: true
			},
			{
				id: 7,
				image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/Berserk-thumbnail-176x264.jpg',
				title: 'Berserk',
				chapter: 'Berserk Chap 354',
				url: 'http://truyentranh.net/Berserk',
				url_latest: 'http://truyentranh.net/Berserk/Chap-354',
				status: true
			},
			{
				id: 8,
				image: 'http://cdn.truyentranh.net/upload/image/comic/20150318/Berserk-thumbnail-176x264.jpg',
				title: 'Berserk',
				chapter: 'Berserk Chap 354',
				url: 'http://truyentranh.net/Berserk',
				url_latest: 'http://truyentranh.net/Berserk/Chap-354',
				status: true
			},
		]
		let elements = mangas.map((manga, index) => {
			return <Slider_Items
				key				 ={ manga.id }
				image			 ={ manga.image }
				chapter		 ={ manga.chapter }
				url				 ={ manga.url }
				url_latest ={ manga.url_latest}
			>{ manga.title }</Slider_Items>
		});
		return (
			<div className="home-slider bg-main-section">
				<div className="container">
					<div className="row">
						<div className="col-12">
							<h3 className="tilte-update">Truyện hot mới ra lò</h3>
						</div>
					</div>
					<Slider {...settings}>
						{ elements }
					</Slider>
				</div>
			</div>
		);
	}
}
export default SliderHome;
