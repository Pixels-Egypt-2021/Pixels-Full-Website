import React from 'react'
import unique from '../../../../../../public/images/about-page/Uniqe.png';
const Slogan = () => {
  return (
    <section id="slogan2" className="container mt-5">
      <div className="row  justify-content-md-between justify-content-between align-items-center text-center" >
        <div className="about-slogan col-lg-4 col-4">
          <h3 className="about-slogan-text">Every Pixel is a knowledge</h3>
        </div>
        <div className="about-slogan-img col-lg-8 col-8">
          <img src={ unique } className="uniqe-image w-100" alt=""/>
        </div>
      </div>
    </section>
  )
}
export default Slogan;