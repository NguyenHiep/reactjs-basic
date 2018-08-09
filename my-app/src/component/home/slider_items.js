import React, {Component} from 'react';

class SliderItems extends Component {
  render() {
    return (
      <div>
        <a href={this.props.url} className="slick-item"><img src={this.props.image} alt={this.props.title}/>
          <h3 className="manga-title">{this.props.children}</h3>
        </a>
        <p className="chapter"><a href={this.props.url_latest}>{this.props.chapter}</a></p>
      </div>
    );
  }
}

export default SliderItems;
