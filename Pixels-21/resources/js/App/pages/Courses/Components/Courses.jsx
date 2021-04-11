import React, { useState } from 'react'
import { Col, Row } from 'react-bootstrap';
import { Link, NavLink } from 'react-router-dom';
import { FaStar, FaRegStar } from 'react-icons/fa';


const Courses = () => {
  const path = '/images/courses-page/';
  const coursesCategories = ['all', 'CS', 'Power', 'Mechanics'];
  const [coursesCategory, setCoursesCategory] = useState('all');
  const courses = [
    {id:1, title:"web", category:'CS', image: path+'web.png', rate:5},
    {id:2, title:"arduino", category:'Power', image: path+'arduino.png', rate:5},
    {id:3, title:"solar", category:'Mechanics', image: path+'solar.png', rate:5},
  ];

  const categoryHandler = (category) => {
    setCoursesCategory(category);
  }  

  if(coursesCategory === 'all') {
    var currentCourses = courses;
  } else {
    var currentCourses = courses.filter(course=> course.category === coursesCategory);
  }


  return (
    <section className="courses py">
      <h2 className="courses-title text-center">Unlimited access to more than 1600 courses</h2>
      
      <ul className="nav my-4 justify-content-center">
        {coursesCategories.map((category, index)=> {
          return (
            <li key={index} className="nav-item mx-2">
              <NavLink to={"/courses/"+category} onClick={()=>categoryHandler(category)} activeClassName="active" className="course-tab text-center d-inline-block rounded-circle">{category}</NavLink>
            </li>
          );
        })}
      </ul>

      <div className="courses-items">
        <Row className="justify-content-center align-items-center">
          {currentCourses.map((course)=> {
            return (
              <Col key={course.id} lg={4} md={6} sm={12} className="mb-3">
                <img src={course.image} className="card-img-top" alt="course" />
                <div className="card-body">
                  <h5 className="card-title">{course.title}</h5>
                  <p className="card-text"><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaRegStar className="d-inline-block rate-icon" /></p>
                  <Link to={"/course/"+course.id} className="text-secondary">See Full Course</Link>
                </div>
              </Col>
            );
          })}
        </Row>
      </div>
    </section>
  )
}

export default Courses
