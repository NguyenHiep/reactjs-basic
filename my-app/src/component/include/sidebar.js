import React from 'react';

class SideBar extends React.Component {
	render() {
		return (
			<nav id="sidebar">
				<ul className="list-unstyled components">
					<li className="active"><a>Home</a></li>
					<li><a>About</a></li>
					<li>
						<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
						<ul className="collapse list-unstyled" id="homeSubmenu">
							<li><a>Page</a></li>
							<li><a>Page</a></li>
							<li><a>Page</a></li>
						</ul>
					</li>
					<li><a>Portfolio</a></li>
					<li><a>Contact</a></li>
				</ul>
			</nav>
		);
	}
}
export default SideBar;
