import React from 'react';


function Footer() {

    return (
        <footer className="footer-social-icon text-center section_padding_50 clearfix">
            <div className="footer-text">
                <img className="img-fluid" alt="logo" src="assets/img/logo.svg" /> 
                <p>GrabGetGo</p>
            </div>
            
            <div className="copyright-text">
                <p>&copy; {new Date().getFullYear()} GrabGetGo.</p> 
                <p>All rights reserved.</p>
            </div>

            <div className="social-icon mt-3">
                <a target="_blank" rel="noreferrer" href="https://facebook.com/grabgetgo"><span className="ti-facebook px-2"></span></a>
                <a target="_blank" rel="noreferrer" href="https://twitter.com/grabgetgo"><span className="ti-twitter px-2"></span></a>
                <a target="_blank" rel="noreferrer" href="https://instagram.com/grabgetgo"><span className="ti-instagram px-2"></span></a>
                <a target="_blank" rel="noreferrer" href="https://youtube.com/@grabgetgo"><span className="ti-youtube px-2"></span></a>
            </div>
            <div className="footer-menu mt-3">
                <nav>
                    <ul>
                        <li><a href="https://grabgetgo.com/#home">Home</a></li>
                        <li><a href="https://grabgetgo.com/#about">About</a></li>
                        <li><a href="https://grabgetgo.com/#works">Works</a></li>
                        <li><a href="https://grabgetgo.com/#feedback">Feedback</a></li>
                        <li><a href="https://grabgetgo.com/#contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </footer> 
        
    )
}

export default Footer;