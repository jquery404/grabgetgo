import React from 'react';
import Layout from './layout/Layout.js';

export default function Home() {

    const heading = ['Enterprise Application', 'Brands & Corporations', 'Web & Mobile Application']

    return (
    
        <Layout>
        
            <section className="wellcome_area clearfix" id="home">
                <div className="container h-100">
                    <div className="row h-100 align-items-center">
                        <div className="motoarea col-sm-12 col-md-6">
                            <div className="wellcome-heading">
                                <h1>Turning your concept into creation</h1>
                                <h5 className="mb-5">We build custom software for your <br/><b className="exp-moto"><span>{heading[1]}</span><span>{heading[2]}</span><span>{heading[0]}</span></b></h5><br/>
                                <div className="get-start-area">
                                    <a className="btn start-btn wow fadeIn animated start-btn-animated" data-wow-duration="1s" data-wow-delay="0.3s" href="https://grabgetgo.com/#contact" role="button">Get Started &nbsp;<i className="ti-angle-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div className="col-sm-12 col-md-6 imgslider h-50">
                            <img className="img-fluid" src="/assets/img/180.png" alt="grabgetgo brand"/>
                            <img className="img-fluid" src="/assets/img/mob-web.png" alt="grabgetgo mobile and web"/>
                            <img className="img-fluid" src="/assets/img/ecommerce.png" alt="grabgetgo ecommerce"/>
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
            
            <div className="video-section">
                <div className="container">
                    <div className="row">
                        <div className="col-12">
                            <div className="video-area" style={{backgroundImage: 'url("assets/img/food-cover.jpg")'}}>
                                <div className="video-play-btn">
                                    <a href="https://www.youtube.com/watch?v=f5BBJ4ySgpo" className="video_btn">&nbsp;<i className="ti-control-play" aria-hidden="true"></i>&nbsp;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section className="cool_facts_area clearfix">
                <div className="container">
                    <div className="row">
                        <div className="single-fact col-md-3">
                            <div className="single-cool-fact wow fadeInUp-btn-animated fadeInUp mb-5" data-wow-delay="0.2s">
                                <div className="counter-area">
                                    <h3><span className="counter">11</span></h3>
                                    <p>YEARS IN BUSINESS</p>
                                </div>
                            </div>

                            <div className="single-cool-fact wow fadeInUp-btn-animated fadeInUp-btn-animated fadeInUp mb-5" data-wow-delay="0.2s">
                                <div className="counter-area">
                                    <h3><span className="counter">6</span></h3>
                                    <p>EXPERT TEAMS</p>
                                </div>
                            </div>

                            <div className="single-cool-fact wow fadeInUp-btn-animated fadeInUp mb-5" data-wow-delay="0.2s">
                                <div className="counter-area">
                                    <h3><span className="counter">57</span></h3>
                                    <p>PROJECT FINISHED</p>
                                </div>
                            </div>

                            <div className="single-cool-fact wow fadeInUp-btn-animated fadeInUp" data-wow-delay="0.2s">
                                <div className="counter-area">
                                    <h3><span className="counter">18</span></h3>
                                    <p>WORLDWIDE CLIENTS</p>
                                </div>
                            </div>
                        </div>

                        <div className="offset-md-1 col-md-8">
                            <div className="single-faq mb-5">
                                <div className="row">
                                    <div className="col-12 mb-3">
                                        <h3 className="subhead">We've worked with the big boys</h3>
                                    </div>
                                    <div className="col-4 col-md-2 p-3"><img className="img-fluid" src="assets/img/logo_cocacola.png" alt="Cocacola project" /></div>
                                    <div className="col-4 col-md-2 p-3"><img className="img-fluid" src="assets/img/logo_reebok.png" alt="Reebok project" /></div>
                                    <div className="col-4 col-md-2 p-3"><img className="img-fluid" src="assets/img/logo_hurbal.png" alt="Herbal Life" /></div>
                                    <div className="col-4 col-md-2 p-3"><img className="img-fluid" src="assets/img/logo_adidas.png" alt="Adidas" /></div>
                                    <div className="col-4 col-md-2 p-3"><img className="img-fluid" src="assets/img/logo_ripley.png" alt="Ripley" /></div>
                                    <div className="col-4 col-md-2 p-3"><img className="img-fluid" src="assets/img/logo_laureate.png" alt="Laureate" /></div>
                                    <div className="clearfix"></div>
                                </div>
                            </div>

                            <div className="single-faq mt-5">
                                <h3 className="subhead">We are a passionate team</h3>

                                <div className="row justify-content-center">
                                    <div className="col-6 col-md-4 text-center p-3">
                                        <div className="abbr"><span className="vollkornreg">An</span></div>
                                        <div className="name"><span className="vollkornreg">Andrea Sghedoni</span></div>
                                        <div className="role"><span className="dosismedium">Chief Executive Officer</span></div>
                                    </div>

                                    <div className="col-6 col-md-4 text-center p-3">
                                        <div className="abbr"><span className="vollkornreg">Ke</span></div>
                                        <div className="name"><span className="vollkornreg">Kester Woodie</span></div>
                                        <div className="role"><span className="dosismedium">Cheif Technical Officer</span></div>
                                    </div>

                                    <div className="col-6 col-md-4 text-center p-3">
                                        <div className="abbr"><span className="vollkornreg">La</span></div>
                                        <div className="name"><span className="vollkornreg">Lavinia Aurelio</span></div>
                                        <div className="role"><span className="dosismedium">Creative Technologist</span></div>
                                    </div>

                                    <div className="col-6 col-md-4 text-center p-3">
                                        <div className="abbr"><span className="vollkornreg">Mi</span></div>
                                        <div className="name"><span className="vollkornreg">Miguel Tijero Scamarone</span></div>
                                        <div className="role"><span className="dosismedium">Chief Financial Officer</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div id="works">    
                <div className="section-heading text-center">
                    <h2>Case Studies</h2>
                    <div className="line-shape"></div>
                </div>

                <section className="special-area bg-white section_padding_100 section_margin_100">
                    <div className="casecover absolute-right col-md-6" style={{backgroundImage: 'url("img/cocacola-cover.jpg")'}}></div>
                    
                    <div className="container">
                        <div className="row">
                            <div className="col-12 col-md-6 casewrap-right">
                                <div className="section-heading">
                                    <h4>180 Photo Booth</h4>
                                </div>

                                <p> 180 and 360 video images have been really popular in recent years. It is on an uprising trend and social media giants like Facebook and Instagram are all pushing support of GIF image on their platforms. Because of its animation aspect, GIF images are usually more appealing visually and draw more audience</p>

                                <div className="learn-more-button wow bounceInDown-btn-animated bounceInDown" data-wow-delay="0.5s">
                                    <a href="https://grabgetgo.com/photo-booth-180">LEARN MORE</a>
                                </div>
                            </div>
                            <div className="col-12 col-md-6">
                                <img src="/assets/img/cocacola.gif" alt="cocacola" className="img-fluid" data-parallax="{&quot;y&quot;: -80, &quot;smoothness&quot;: 30}" />
                            </div>
                                
                        </div>
                    </div>
                </section>
                
                <section className="special-area bg-white section_padding_100 section_margin_100">
                    <div className="casecover absolute-left col-md-6" style={{backgroundImage: 'url("img/food-cover.jpg")'}}></div>
                    
                    <div className="container">
                        <div className="row">
                            <div className="col-12 col-md-6">
                                <img src="/assets/img/food-app.png" alt="food-app" className="img-fluid" data-parallax="{&quot;y&quot;: -80, &quot;smoothness&quot;: 30}" />
                            </div>

                            <div className="col-12 col-md-6 casewrap-left">
                                <div className="section-heading">
                                    <h4>Get Your App In Just One-Click!</h4>
                                </div>

                                <p> Mobile applications allow you to put your business directly in the hands of your clients and customers. They increase your scalability, global availability, and keep all aspects of your enterprise connected. We will talk with you to understand your goals, your business, and your audience.</p>

                                <div className="learn-more-button wow bounceInDown-btn-animated bounceInDown" data-wow-delay="0.5s">
                                    <a href="https://grabgetgo.com/mobile-app-development">LEARN MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section className="special-area bg-white section_padding_100 section_margin_100">
                    <div className="casecover absolute-right col-md-6" style={{backgroundImage: 'url("img/disco-cover.jpg")'}}></div>
                    
                    <div className="container">
                        <div className="row">
                            <div className="col-12 col-md-6 casewrap-right">
                                <div className="section-heading">
                                    <h4>GrabGetGo Store</h4>
                                </div>

                                <p> We have built many web applications for small, medium, and large enterprises around the globe. Whether you simply require a web design for your business or are looking to provide a solution with a web application, we can help you. </p>

                                <div className="learn-more-button wow bounceInDown-btn-animated bounceInDown" data-wow-delay="0.5s">
                                    <a href="https://grabgetgo.com/shop">LEARN MORE</a>
                                </div>
                            </div>
                            <div className="col-12 col-md-6">
                                <img src="/assets/img/disco-beat.png" alt="disco-beat" className="img-fluid" data-parallax="{&quot;y&quot;: -80, &quot;smoothness&quot;: 30}" />
                            </div>
                                
                        </div>
                    </div>
                </section>


            </div>


            <section className="clients-feedback-area bg-white section_padding_100 clearfix" id="feedback">
                <div className="section-heading text-center">
                    <h2>Some Feedback From Our Clients</h2>
                    <div className="line-shape"></div>
                </div>

                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-12 col-md-4">
                            <div className="quote-text"><p>We are using GrabGetGo CRM because we found it very easy to use. From the very beginning, their support teams helped us with the integration. Within a few weeks, our sales analytics were up, Facebook and email accounts synced, and support pages were live. We tried other marketing software, but functionalities were far too complex. Now we are able to complete our marketing tasks faster.</p></div>
                                <div className="quote-credit">
                                    <div className="client-thumbnail">
                                        <img src="/assets/img/client-1.jpg" alt="client" />
                                    </div>
                                    <div className="quote-citation">
                                        <h5>Riley Rees</h5>
                                        <p>CEO PWD</p>
                                    </div>
                                </div>
                        </div>
                            
                        <div className="col-12 col-md-4">
                            <div className="quote-text"><p>We needed some fresh and innovative approach for our campaign. GrabGetGo BTL team quickly gained an in-depth understanding of our business and developed a great marketing strategy that has had a significant impact on our business campaign. Their 180-photobooth and 360-photobooth engaged 3 times more customers and 4 times more user data than any of our previous systems.</p></div>
                            <div className="quote-credit">
                                <div className="client-thumbnail">
                                    <img src="/assets/img/client-2.jpg" alt="client" />
                                </div>
                                <div className="quote-citation">
                                    <h5>Xing Kline</h5>
                                    <p>Marketer AOP</p>
                                </div>
                            </div>
                        </div>
                        
                        <div className="col-12 col-md-4">
                            <div className="quote-text"><p>I could not be more impressed with their professionalism, teamwork, communication and results. In fact, their attention to detail, cost and project management is outstanding. They not only make my job easier, but they make me look good. They are a true extension of my team and a very valued partner.</p></div>

                            <div className="quote-credit">
                                <div className="client-thumbnail">
                                    <img src="/assets/img/client-3.jpg" alt="client" />
                                </div>
                                <div className="quote-citation">
                                    <h5>Emily Lewis</h5>
                                    <p>Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section className="our-monthly-membership section_padding_50 clearfix">
                <div className="container">
                    <div className="row align-items-center">
                        <div className="col-md-8">
                            <div className="membership-description">
                                <h2>We love to help with your idea.</h2>
                                <p>Get expert advice on your ideas or project and lets build something extraordinatry</p>
                            </div>
                        </div>
                        <div className="col-md-4">
                            <div className="get-started-button wow bounceInDown-btn-animated bounceInDown" data-wow-delay="0.5s">
                                <a href="https://grabgetgo.com/#contact">Let's talk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 

            <section className="footer-contact-area section_padding_100 clearfix" id="contact">
                <div className="section-heading text-center">
                    <h2>Get in touch with us!</h2>
                    <div className="line-shape"></div>
                </div>
                <div className="container">
                    <div className="row">
                        <div className="col-md-6">
                            <div>
                                <p>Our team always ready to help. Leave us your inquiry. We will get back to you in less than 24 hours, it's a Promise!</p>
                            </div>
                            <div className="card-body">
                                <div className="justify-center">
                                    <div className="support-left"><img width="80px" className="rounded-circle img-circle img-fluid" alt="support_2" src="/assets/img/support_2.jpg" /></div>
                                    <div className="support"><img width="80px" className="rounded-circle img-circle img-fluid" alt="support_3" src="/assets/img/support_3.jpg" /></div>
                                    <div className="support-right"><img width="80px" className="rounded-circle img-circle img-fluid" alt="support_1" src="/assets/img/support_1.jpg" /></div>
                                </div>
                                <div className="justify-center">
                                    <h5 className="card-title mb-0 mt-3">Evangeline,&nbsp;</h5>
                                    <h5 className="card-title mb-0 mt-3">Janet,&nbsp;</h5>
                                    <h5 className="card-title mb-0 mt-3">Michael</h5>
                                </div>
                            </div>
                            
                            <div className="phone-text">
                                <p><span><i className="fa fa-phone" aria-hidden="true"></i> CALL US:</span> +60 11-5791 6215 &nbsp; 
                                    <a href="https://wa.me/601157916215?text=I%27m%20interested%20in%20discussing%20about%20my%20business%20idea" target="_blank" rel="noreferrer">
                                        <i className="fab fa-whatsapp fa-2x" aria-hidden="true"></i>
                                    </a>
                                </p>
                            </div>
                            <div className="email-text">
                                <p><span><i className="fa fa-headphones" aria-hidden="true"></i> EMAIL US:</span> info[at]grabgetgo.com</p>
                            </div>
                            <div className="location-text">
                                <p><span><i className="fa fa-map"></i> VISIT US:</span> Bangsar South, KL, MALAYSIA.</p>
                            </div>
                        </div>
                        <div className="col-md-6">
                            <div className="contact_from">
                                <form action="https://grabgetgo.com/#" method="post">
                                    <div className="contact_input_area">
                                        <div className="row">
                                            <div className="col-md-12">
                                                <div className="form-group">
                                                    <input type="text" className="form-control" name="name" id="name" placeholder="Your Name *" required=""/>
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <div className="form-group">
                                                    <input type="email" className="form-control" name="email" id="email" placeholder="E-mail address *" required="" />
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <div className="form-group">
                                                    <input type="text" className="form-control" name="phone" id="phone" placeholder="Phone number or Skype ID" />
                                                </div>
                                            </div>
                                            <div className="col-12">
                                                <div className="form-group">
                                                    <textarea name="message" className="form-control" id="message" cols="30" rows="4" placeholder="How can we help you? *" required=""></textarea>
                                                </div>
                                            </div>
                                        
                                            <div className="col-12 pt-3">
                                                <button type="button" className="btn submit-btn contact-now">Send Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </Layout>
    
    )
};