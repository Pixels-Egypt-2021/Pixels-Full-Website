import React, { useState } from 'react'
import { Col, Row } from 'react-bootstrap';
import { FaStar, FaRegStar } from 'react-icons/fa';


const Instructors = () => {
  const path = '/images/courses-page/';
  const instructors = [
    {id:1, name:"web", commite:'CS', image: path+'web.png', students:5, courses: 4},
    {id:1, name:"web", commite:'CS', image: path+'web.png', students:5, courses: 4},    
    {id:1, name:"web", commite:'CS', image: path+'web.png', students:5, courses: 4},
    {id:1, name:"web", commite:'CS', image: path+'web.png', students:5, courses: 4},
  ];


  return (
      <section className="instructors py">
        <h2 className="instructors-title text-left">Our most popular<br /> instructors this <span className="text-color">month</span></h2>

        <div className="instructors-items">
          <Row className="justify-content-center align-items-center">
            {instructors.map((instructor)=> {
              return (
                <Col key={instructor.id} lg={3} md={4} sm={12} className="mb-3">
                  <img src={instructor.image} className="card-img-top" alt="instructor" />
                  <div className="card-body bg-light">
                    <h5 className="card-title">{instructor.name}</h5>
                    <h6 className="card-text">{instructor.commite}</h6>
                    <h6 className="card-text">{instructor.students} Students</h6>
                    <h6 className="card-text">{instructor.courses} Courses</h6>
                  </div>
                </Col>
              );
            })}
          </Row>
        </div>
      </section>
  )
}

export default Instructors
