import React, {Component} from 'react';

class ItemsHot extends Component {
  render() {
    let list_chapters = this.props.list_chapter.map((chapter, index) => {
      return <li key={chapter.id}><a className="latest-chap" href={chapter.url} target="_blank"
                                     title={chapter.title}>{chapter.title}</a></li>
    });
    return (
      <div className="col-xs-12 col-md-6">
        <div className="media mainpage-manga mt-0">
          <a href={this.props.url} className="tooltips">
            <img src={this.props.image} alt={this.props.title} className="pr-2"/>
            <span>
              <img src="http://cdn.truyentranh.net/frontend/images/callout.gif" className="callout"/>
              <p className="description">
                <strong>Tên khác:</strong>{this.props.title_en}<br />
                <strong>Thể loại: </strong>{this.props.type}<br />
                <strong>Tác giả:</strong>{this.props.author}<br />
                <strong>Nội dung:</strong>{this.props.description}
                </p>
            </span>
          </a>
          <div className="media-body">
            <h4 className="manga-newest">
              <a href={this.props.url} title={this.props.title}
                 data-tt="#truyenmoi-31347">{this.props.children}</a></h4>
            <div className="row">
              <div className="col-12">
                <ul className="hotup-list list-unstyled clearfix">
                  {list_chapters}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
export default ItemsHot;