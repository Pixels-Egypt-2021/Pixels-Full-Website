import React from 'react';


function handleVideoClick () {
    let vedioIframe = document.querySelector('#vedioSrc');
    vedioIframe.src = "https://www.youtube.com/embed/bbvUKhlI1DI";

}

function removeStc () {
    let vedioIframe = document.querySelector('#vedioSrc');
    vedioIframe.src = "";

}


export default function About() {

    return (
        <section id="about" className="about container py-5">
            <div className="row">
                <div className="container">
                    <div className="row">
                        <div className="about-info col-lg-6 col-12">
                            <h3 className="section-title1">About US</h3>
                            <span className="line mx-md-auto d-inline-block"></span>
                            <p className="about-desc ">Pixels is a student activity established 6 years ago in helwan University; a non-profit organization, We are a community of makers and ambitious talented engineers, aiming to build a community that believes in science and building instead of consuming, because only by the aid of science and knowledge we can achieve our vision, which is to spread the engineering science, to create a productive community.</p>
                        </div>
                    
                        <div className="about-images text-center col-lg-6 col-12">
                            <img alt="about" className="position-absolute about-img about-img2" width="220px" height="150px" src="./img/home-page/about/about2.jpg" alt=""/>
                            <img alt="about" className="position-absolute about-img about-img1" width="220px" height="150px" src="./img/home-page/about/about1.jpg" alt=""/>
                            <img alt="about" className="position-absolute about-img about-img3" width="220px" height="150px" src="./img/home-page/about/about3.jpg" alt=""/>
                            <img alt="about" className="position-absolute about-img about-img4" width="220px" height="150px" src="./img/home-page/about/about4.jpg" alt=""/>
                        </div>
                    </div>
                </div>
            </div>

            <div className="row">
                <div className="col-lg-6 align-self-center v-m-heading" >
                    <label className=" rounded-pill">What We Do?</label>
                    <h2>MISSION</h2>
                    <p className="text-justify">
                        Building well qualified members technically and personally so that they could afford responsibility towards the community in their life journey & to effectively develop & enhance the entity on all levels, so it will have a stronger impact over the nation and making effective leaders, able to hold positions in the near future & devoted towards enhancing these committees.
                    </p>

                    <label className=" rounded-pill">What We Aspire To Be?</label>
                    <h2>VISION</h2>
                    <p className="text-justify">
                        Building strong, conscious and well quailed calibers, & having a creative Arabic society which can improve and produce different new technologies through enriching youth skills.
                    </p>
                    <div className="about-images text-center col-lg-6 col-12">
                        <img alt="about" className="position-absolute about-img about-img2" width="220px" height="150px" src="./img/home-page/about/about2.jpg" alt=""/>
                        <img alt="about" className="position-absolute about-img about-img1" width="220px" height="150px" src="./img/home-page/about/about1.jpg" alt=""/>
                        <img alt="about" className="position-absolute about-img about-img3" width="220px" height="150px" src="./img/home-page/about/about3.jpg" alt=""/>
                        <img alt="about" className="position-absolute about-img about-img4" width="220px" height="150px" src="./img/home-page/about/about4.jpg" alt=""/>
                    </div>
                </div>
            </div>

            <div className="row " style={{ "margin":"143px 0 45px 0" }}>
                <div className="col-lg-12  video-image" style={{backgroundImage: "url(/images/MagazineImg/WHO.png)"}}>
                    <i onClick={handleVideoClick} data-toggle="modal" data-target="#showvideo" className="fa fa-play"></i>
                </div>

                {/* Start Modal  */}
                <div onClick={removeStc} className="modal fade" id="showvideo" tabIndex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered customeVideoWidth">
                        <div className="modal-content w-100">
                            <button type="button" className="close text-white customeTimes" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>

                            <div className="modal-body p-0" style={{height:"60vh"}}>
                                <iframe title="About Pixels Egypt" id="vedioSrc" width="100%" height="100%" src="https://www.youtube.com/embed/bbvUKhlI1DI" frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowFullScreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                {/* End Modal  */}
            </div>

            <div className="row">
                <div className="col-lg-6 align-self-center v-m-heading" >
                    <label className=" rounded-pill">What We Do?</label>
                    <h2>MISSION</h2>
                    <p className="text-justify">
                        Building well qualified members technically and personally so that they could afford responsibility towards the community in their life journey & to effectively develop & enhance the entity on all levels, so it will have a stronger impact over the nation and making effective leaders, able to hold positions in the near future & devoted towards enhancing these committees.
                    </p>
                </div>

                <div className="col-lg-6 align-self-center v-m-heading" >
                    <label className=" rounded-pill">What We Aspire To Be?</label>
                    <h2>VISION</h2>
                    <p className="text-justify">
                        Building strong, conscious and well quailed calibers, & having a creative Arabic society which can improve and produce different new technologies through enriching youth skills.
                    </p>
                </div>
            </div>
        
        </section>
    )
}
