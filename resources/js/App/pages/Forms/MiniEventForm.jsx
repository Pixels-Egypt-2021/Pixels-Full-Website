import React, { Component } from 'react';
import './forms.css';
import axios from 'axios';
import Joi from 'joi-browser';
import { toast } from 'react-toastify';

import Header from './Header'
import { Redirect } from 'react-router-dom';


var allaw = true;

export default class MiniEventForm extends Component {

    state = {
        courses1 : [],
        courses2 : [],
        flag: false,
        cerrors : {
            name : "write a valid name",
            email : "email is not valid",
            university : "your university or school required",
            phone : "check your phone number",
            studyYear: "mention your academic year",
            courseId1 : "choose your first course",
            courseId2 : "Priority for the first course ",
        },
        errors : {},
        req: {} 
    }

    schema = {
        name: Joi.string().required(),
        email: Joi.string().email().required(),
        university: Joi.string().required(),
        phone: Joi.number().integer().required(),
        studyYear : Joi.required(),
        courseId1 : Joi.number().integer().required(),
        courseId2 : Joi.required()
    }

    async componentDidMount(){
        const { data }  = await axios.get('http://localhost:8000/api/get-courses') ;
        this.setState({courses1 : [...data.courses]});
    }

    handleOption = (e) => {
        let courseId = Number(e.target.value);
        let courses2 = this.state.courses1.filter(course => course.id !== courseId);
        this.setState({courses2});
    }

    handleInput = (e) => {

        let req = {...this.state.req , [e.target.id]: e.target.value};
        this.setState({req});

        if(this.state.flag){
            let errors = {};
            const result = Joi.validate(this.state.req , this.schema , {abortEarly : false});

            if(result.error === null ) {
                this.setState({ errors : { } });
                return null ;
            };

            for (let error of result.error.details ) {
                errors[error.path] = error.message;
            }
            this.setState({ errors });
        }
    }



    submit = async (e) => {
        e.preventDefault();

        let errors = { };
        const result = Joi.validate(this.state.req , this.schema , {abortEarly : false});

        if(result.error === null ) {

            this.setState({ errors : { } });

            let object = this.state.req;
            let req = await axios.post('http://localhost:8000/api/post-participants', object);
            console.log(req);
            this.setState({req:{
                name:"",
                phone : "",
                email : "",
                university : "",
                studyYear: "",
                courseId1 : "",
                courseId2 : ""
            }});

            toast.success("Submited Successfuly");
            
            return <Redirect to='/home' />
        };

        for (let error of result.error.details ) {
            errors[error.path] = error.message;
        }

        this.setState({flag:true})

        this.setState({ errors });

        toast.error("Input Error");
    }

    render() {
        return (
            <>
            <Header />
            <section className="registration-page">
                <div className=" container pt-5">
                    <div className="row justify-content-center pt-5 h-100">
                        <div className= " col-md-6 m-lg-5 my-5 p-5 rounded align-self-center border form-style">
                            <form onSubmit = {this.submit} className="text-white">
                                <h2 className="text-center"> Close The Gap </h2>

                                <div className="form-group">
                                    <label htmlFor="name">Name</label>
                                    <input onChange={this.handleInput} value = {this.state.req.name} type="text" className="form-control rounded-pill border-0" name="name" id="name" placeholder="ex:pixels" />
                                    {this.state.errors.name &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.name}</div>)}
                                </div>
                                <div className="form-group">
                                    <label htmlFor="email">Email</label>
                                    <input onChange={this.handleInput} value = {this.state.req.email} type="email" className="form-control rounded-pill border-0" name="email" id="email" placeholder="pixels21@gmail.com" />
                                    {this.state.errors.email &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.email}</div>)}
                                </div>
                                <div className="form-group">
                                    <label htmlFor="phone">phone</label>
                                    <input onChange={this.handleInput} value = {this.state.req.phone} type="phone" className="form-control rounded-pill border-0" name="phone" id="phone" placeholder="01110001111" />
                                    {this.state.errors.phone &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.phone}</div>)}
                                </div>


                                <div className="form-group">
                                    <label htmlFor="unvirsity">University / school</label>
                                    <input onChange={this.handleInput} value = {this.state.req.university} type="text" className="form-control rounded-pill border-0" name="university" id="university" placeholder="Engineering Hellwan" />
                                    {this.state.errors.university &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.university}</div>)}
                                </div>

                                <div className="form-group">
                                    <label htmlFor="acadimicYear">Academic Year</label>
                                    <input onChange={this.handleInput} value = {this.state.req.studyYear} type="text" className="form-control rounded-pill border-0" name="studyYear" id="studyYear" placeholder="pre / 1st / 2sec / 3th" />
                                    {this.state.errors.studyYear &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.studyYear}</div>)}
                                </div>

                                <div className="form-group">
                                    <label htmlFor="courseId1">First Course</label>
                                    <select onChange = {this.handleOption} onClick={ this.handleInput}  name="course one" className="form-control border-0 w-75" id="courseId1">
                                            <option value={null}>choose one</option>
                                        {this.state.courses1.map((course,index)=>(
                                            <option key={index} value= {course.id}>{course.course_name}</option>
                                        ))}
                                    </select>
                                    {this.state.errors.courseId1 &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0 w-75">{this.state.cerrors.courseId1}</div>)}
                                </div>

                                <div className="form-group">
                                    <label htmlFor="courseId2">Second course</label>
                                    <select onClick={this.handleInput}  name="course two" className="form-control border-0 w-75" id="courseId2">
                                            <option value={null}>choose one</option>
                                            <option value = "" >None</option>
                                        {this.state.courses2.map((course,index)=>(
                                            <option key={index} value= {course.id}>{course.course_name}</option>
                                        ))}
                                    </select>
                                    {this.state.errors.courseId2 &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0 w-75">{this.state.cerrors.courseId2}</div>)}
                                </div>


                                <button className="btn btn-block btn-outline-secondary rounded-pill mt-5">Submit</button>

                            </form>
                        </div>
                    </div>

                </div>
            </section>
            </>
        )
    }
}
