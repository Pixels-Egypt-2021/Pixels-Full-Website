import React from 'react'
import unique from '../../../../../../public/images/about-page/Uniqe.png';
import { Col, Container, Row } from 'react-bootstrap';

const Slogan = () => {
  return (
    <Container id="slogan2" className="mt-5">
      <Row className="justify-content-md-between justify-content-between align-items-center text-center" >
        <Col lg={4} sm={4} className="about-slogan">
          <h3 className="about-slogan-text">Every Pixel is a knowledge</h3>
        </Col>
        <Col lg={8} sm={7} className="about-slogan-img">
          <img src={ unique } className="uniqe-image w-100" alt=""/>
        </Col>
      </Row>
    </Container>
  )
}
export default Slogan;