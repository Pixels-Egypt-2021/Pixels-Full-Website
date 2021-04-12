import React from 'react'
import { Container, Row } from 'react-bootstrap';
import { FaBookReader } from 'react-icons/fa';

const Slogan = () => {
  return (
    <Container id="slogan" className="py">
        <Row className="slogan-container py-5 row justify-content-center align-items-center text-center" >
          <div className="item1 col-lg-4 col-sm-3">
            <FaBookReader />
            <h2 className="slogan-text">Learn</h2>
          </div>
          <div className="item2 py-3 col-lg-4 col-sm-3">
            < />
            <h2 className="slogan-text">Make</h2>
          </div>
          <div className="item2 col-lg-4 col-sm-3">
            <img className="slogan-img" src="./img/home-page/slogan/Website-Updates.svg" alt="asd"/>
            <h2 className="slogan-text">Share</h2>
          </div>
        </Row>
    </Container>
  )
}
export default Slogan;