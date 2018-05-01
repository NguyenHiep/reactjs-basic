import React, { Component } from 'react';

class ItemsNew extends Component {
	render() {
		return (
			<div className="col-xs-12 col-md-6">
				<div className="media mainpage-manga mt-0">
					<a href={this.props.url} className="tooltips">
						<img src={this.props.image} alt={this.props.title} className="pr-2" />
						<span>
						 <img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout" />
						 <p className="description">
							<strong>Tên khác:</strong>{this.props.title_en}<br />
							<strong>Thể loại: </strong>{this.props.type}<br />
							<strong>Tác giả:</strong>{this.props.author}<br />
							<strong>Nội dung:</strong>{this.props.description}
						 </p>
					 </span>
					</a>
					<div className="media-body">
						<h4 className="manga-newest"><a href={this.props.url}>{this.props.children}</a></h4>
						<p className="description">
							<span>Tên khác:</span>{this.props.title_en}<br />
							<span>Thể loại: </span>{this.props.type}<br />
							<span>Tác giả:</span>{this.props.author}<br />
							<strong>Nội dung:</strong>{this.props.description}
						</p>
					</div>
				</div>
			</div>
		);
	}
}

export default ItemsNew;
