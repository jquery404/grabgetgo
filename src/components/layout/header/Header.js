import React from 'react';


function Header() {

    return (
        <>
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
                                        <li className="nav-item"><a className="nav-link" href="/about">About</a></li>
                                        <li className="dropdown active">  
                                            <a className="nav-link dropbtn" href="https://grabgetgo.com/#works">
                                                Services <i className="fa fa-angle-down"></i>
                                            </a>
                                            <div className="dropdown-content">
                                            <a href="/photo-booth-180">180 Photo Booth</a>
                                            <a href="/photo-booth-360">360 Photo Booth</a>
                                            <a href="/interactive-event-solutions">Interactive Event</a>
                                            <a href="/web-application-development">Web Apps</a>
                                            <a href="/mobile-app-development">Mobile Apps</a>
                                            <a href="/enterprise-software-developers">Enterprise Software</a>
                                            </div>
                                        </li>
                                        <li className="nav-item"><a className="nav-link" href="https://grabgetgo.com/#feedback">Feedback</a></li>
                                        <li className="nav-item"><a className="nav-link" href="/contact">Contact</a></li>
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
    
        <nav className="nk-navbar nk-navbar-full nk-navbar-align-center" id="nav-full">
            <div className="nk-nav-table">
                <div className="nk-nav-row">
                    <div className="container">
                        <div className="nk-nav-header">
                            <div className="nk-nav-logo">
                                <a href="https://grabgetgo.com/" className="nk-nav-logo">
                                    <img src="/assets/img/logo.png" alt="logo" width="31" />
                                </a>
                            </div>
                            <div className="nk-nav-close nk-navbar-full-toggle"><span className="fa fa-2x fa-times"></span></div>
                        </div>
                    </div>
                </div>
                <div className="nk-nav-row-full nk-nav-row">
                    <div className="nano">
                        <div className="nano-content" tabIndex="0">
                            <div className="nk-nav-table">
                                <div className="nk-nav-row nk-nav-row-full nk-nav-row-center">
                                    <ul className="nk-nav">
                                        <li><a href="https://grabgetgo.com/">Home</a></li>
                                        <li><a href="https://grabgetgo.com/about">About</a></li>
                                        <li className="nk-drop-item"><a href="https://grabgetgo.com/#">Services</a>
                                            <ul className="dropdown">
                                                <li className="dropdown-back"><a href="https://grabgetgo.com/#">Back</a></li>
                                                <li><a href="https://grabgetgo.com/photo-booth-180">180 Photo Booth</a></li>
                                                <li><a href="https://grabgetgo.com/photo-booth-360">360 Photo Booth</a></li>
                                                <li><a href="https://grabgetgo.com/interactive-event-solutions">Interactive Event</a></li>
                                                <li><a href="https://grabgetgo.com/web-application-development">Web Apps</a></li>
                                                <li><a href="https://grabgetgo.com/mobile-app-development">Mobile Apps</a></li>
                                                <li><a href="https://grabgetgo.com/enterprise-software-developers">Enterprise Software</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="https://grabgetgo.com/#feedback">Feedback</a></li>
                                        <li><a href="https://grabgetgo.com/contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div className="nano-pane">
                            <div className="nano-slider"></div>
                        </div>
                    </div>
                </div>
                <div className="nk-nav-row">
                    <div className="container">
                        <div className="nk-nav-social">
                            <ul>
                                <li><a href="https://twitter.com/grabgetgo"><i className="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/grabgetgo/"><i className="fa fa-facebook"></i></a></li>
                                <li><a href="https://youtube.com/grabgetgo"><i className="fa fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/grabgetgo/"><i className="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        </>
    )
}

export default Header;