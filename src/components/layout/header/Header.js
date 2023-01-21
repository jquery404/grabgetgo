import React from 'react';


function Header() {

    return (
        <div className="header_area animated">
            <div className="container-fluid">
                <div className="row align-items-center">
                    <div className="col-12 col-lg-10">
                        <div className="menu_area">
                            <nav className="navbar navbar-expand-lg navbar-light">
                                <a className="navbar-brand" href="https://grabgetgo.com/">
                                    <img className="img-fluid" alt="logo" src="/assets/img/logo.svg" />
                                </a>
                                <a className="cd-primary-nav-trigger" href="https://grabgetgo.com/">
                                <span className="cd-menu-icon"></span>
                                </a>
                                <div className="collapse navbar-collapse" id="ca-navbar">
                                    <ul className="navbar-nav ml-auto" id="nav">
                                        <li className="nav-item"><a className="nav-link" href="https://grabgetgo.com/about">About</a></li>
                                        <li className="dropdown active">  
                                            <a className="nav-link dropbtn" href="https://grabgetgo.com/#works">
                                                Services <i className="fa fa-angle-down"></i>
                                            </a>
                                            <div className="dropdown-content">
                                            <a href="https://grabgetgo.com/photo-booth-180">180 Photo Booth</a>
                                            <a href="https://grabgetgo.com/photo-booth-360">360 Photo Booth</a>
                                            <a href="https://grabgetgo.com/interactive-event-solutions">Interactive Event</a>
                                            <a href="https://grabgetgo.com/web-application-development">Web Apps</a>
                                            <a href="https://grabgetgo.com/mobile-app-development">Mobile Apps</a>
                                            <a href="https://grabgetgo.com/enterprise-software-developers">Enterprise Software</a>
                                            </div>
                                        </li>
                                        <li className="nav-item"><a className="nav-link" href="https://grabgetgo.com/#feedback">Feedback</a></li>
                                        <li className="nav-item"><a className="nav-link" href="https://grabgetgo.com/contact">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div className="col-12 col-lg-2">
                        <div className="sing-up-button d-none d-lg-block">
                            <a href="https://grabgetgo.com/#">Get Started</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    )
}

export default Header;