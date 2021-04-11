import React from 'react';
import { FaGraduationCap , GiGears } from 'react-icons/fa';

const Slogan = () => {
  return (
    <section id="slogan" className="py">
        <section className="slogan-container py-5 row justify-content-center align-items-center text-center" >
          <div className="item1 col-lg-4 col-sm-3">
            <FaGraduationCap /> 
            <h2 className="slogan-text">Learn</h2>
          </div>
          <div className="item2 py-3 col-lg-4 col-sm-3">
            <GiGears />
            <h2 className="slogan-text">Make</h2>
          </div>
          <div className="item2 col-lg-4 col-sm-3">
            <img className="slogan-img" src="./img/home-page/slogan/Website-Updates.svg" alt="asd"/>
            <h2 className="slogan-text">Share</h2>
          </div>
        </section>
    </section>
  )
}
export default Slogan;