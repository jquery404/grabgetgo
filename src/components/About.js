import React from 'react';
import Layout from './layout/Layout.js';

export default function About() {
    return (
    
        <Layout>
            <section className="wellcome_area clearfix" id="home">
                <div className="container h-100">
                    <div className="row h-100 align-items-center">
                        <div className="motoarea col-sm-12 col-md-6">
                            <div className="wellcome-heading">
                                <h1>Turning your concept into creation</h1>
                                <h5 className="mb-5">We build custom software for your</h5><br/>
                                <div className="get-start-area">
                                    <a className="btn start-btn wow fadeIn animated start-btn-animated" data-wow-duration="1s" data-wow-delay="0.3s" href="https://grabgetgo.com/#contact" role="button">Get Started &nbsp;<i className="ti-angle-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div className="col-sm-12 col-md-6 h-50">
                            <img className="img-fluid" src="/assets/img/about.png" alt="grabgetgo brand"/>
                        </div>
                        
                    </div>
                </div>
            </section>
            
            <section className="special-area bg-white section_padding_100" id="about">
                <div className="container">
                    <div className="row">
                        <div className="col-12 col-md-6 text-center mb-5">
                            <div className="section-heading text-center">
                                <h2>What We Do</h2>
                                <div className="line-shape"></div>
                            </div>

                            <p>GrabGetGo provides custom software solutions for events and brand. We have over 11 years experience of developing affordable custom software solutions. Our software helps event organizers/brand managers to create meaningful and unforgettable brand experiences that will leave a lasting impression on each of their guests.</p>

                            <div className="learn-more-button wow bounceInDown bounceInDown-btn-animated mt-5" data-wow-delay="0.5s">
                                <a href="https://grabgetgo.com/about">LEARN MORE</a>
                            </div>
                        </div>
                        <div className="col-12 col-md-6">
                            <div className="row">
                                <div className="col-6 col-md-4">
                                    <a href="https://grabgetgo.com/aerial-drone-services" className="single-special text-center wow fadeInUp-btn-animated fadeInUp" data-wow-delay="0.2s">
                                        <div className="single-icon">
                                            <i className="ti-shopping-cart-full" aria-hidden="true"></i>
                                        </div>
                                        <h4>Aerial Drone <br/>Services</h4>
                                    </a>
                                </div>

                                <div className="col-6 col-md-4">
                                    <a href="https://grabgetgo.com/interactive-event-solutions" className="single-special text-center wow fadeInUp-btn-animated fadeInUp" data-wow-delay="0.2s">
                                        <div className="single-icon">
                                            <i className="ti-video-camera" aria-hidden="true"></i>
                                        </div>
                                        <h4>Bullet Time <br/>Video Booth</h4>
                                    </a>
                                </div>

                                <div className="col-6 col-md-4">
                                    <a href="https://grabgetgo.com/mobile-app-development" className="single-special text-center wow fadeInUp-btn-animated fadeInUp" data-wow-delay="0.2s">
                                        <div className="single-icon">
                                            <i className="ti-tablet" aria-hidden="true"></i>
                                        </div>
                                        <h4>Custom <br/>Mobile Apps</h4>
                                    </a>
                                </div>

                                <div className="col-6 col-md-4">
                                    <a href="https://grabgetgo.com/interactive-event-solutions" className="single-special text-center wow fadeInUp-btn-animated fadeInUp" data-wow-delay="0.2s">
                                        <div className="single-icon">
                                            <i className="ti-comments" aria-hidden="true"></i>
                                        </div>
                                        <h4>Interactive <br/>Event Solutions</h4>
                                    </a>
                                </div>

                                <div className="col-6 col-md-4">
                                    <a href="https://grabgetgo.com/enterprise-software-developers" className="single-special text-center wow fadeInUp-btn-animated fadeInUp" data-wow-delay="0.2s">
                                        <div className="single-icon">
                                            <i className="ti-bar-chart" aria-hidden="true"></i>
                                        </div>
                                        <h4>Enterprise <br/>Software</h4>
                                    </a>
                                </div>

                                <div className="col-6 col-md-4">
                                    <a href="https://grabgetgo.com/web-application-development" className="single-special text-center wow fadeInUp-btn-animated fadeInUp" data-wow-delay="0.2s">
                                        <div className="single-icon">
                                            <i className="ti-world" aria-hidden="true"></i>
                                        </div>
                                        <h4>Web Apps <br/>Development</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </Layout>
    );
}