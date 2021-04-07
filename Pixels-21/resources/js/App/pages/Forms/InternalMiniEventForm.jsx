import React, { Component } from 'react';
import './forms.css';
import axios from 'axios';
import Joi from 'joi-browser';
import { toast } from 'react-toastify';

import Header from './Header'
import { Redirect } from 'react-router-dom';


export default class InternalMiniEventForm extends Component {

    state = {
        courses1 : [],
        courses2 : [],
        committees : [
            "IT",
            "AC",
            "ER",
            "P&c",
            "L&d",
            "Media" ,
            "Geckmedia",
        ],
        flag: false,
        cerrors : {
            name : "write a valid name",
            phone : "write a valid phone",
            committee: "mention your committee",
            courseId1 : "choose your first course",
            courseId2 : "Priority for the first course ",
        },
        errors : {},
        req: {}
    }

    schema = {
        name: Joi.string().required(),
        phone: Joi.number().integer().required(),
        committee : Joi.required(),
        courseId1 : Joi.number().integer().required(),
        courseId2 : Joi.required()
    }

    async componentDidMount(){
        const { data }  = await axios.get('/api/get-courses') ;
        console.log(data.courses);
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
            await axios.post('/api/post-internal-participants', object);

            // window.location.href = "http://localhost:8000";
            toast.success("Submited Successfuly");

            this.setState({req:{ }});

            return <Redirect to='/home' /> ;
        };

        for (let error of result.error.details ) {
            errors[error.path] = error.message;
        }

        this.setState({flag:true});

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
                                    <input onChange={this.handleInput} type="text" className="form-control rounded-pill border-0" name="name" id="name" placeholder="ex:pixels" />
                                    {this.state.errors.name &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.name}</div>)}
                                </div>

                                <div className="form-group">
                                    <label htmlFor="name">Phone</label>
                                    <input onChange={this.handleInput} type="phone" className="form-control rounded-pill border-0" name="phone" id="phone" placeholder="ex:pixels" />
                                    {this.state.errors.phone &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.phone}</div>)}
                                </div>

                                <div className="form-group">
                                    <label htmlFor="courseId1">Committee</label>
                                    <select onChange = {this.handleOption} onClick={ this.handleInput} name="committee" className="form-control border-0 w-75" id="committee">
                                            <option selected disabled>choose one</option>
                                        {this.state.committees.map((committee,index)=>(
                                            <option key={index} value= {committee}>{committee}</option>
                                        ))}
                                    </select>
                                    {this.state.errors.courseId1 &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0 w-75">{this.state.cerrors.courseId1}</div>)}
                                </div>

                                <div className="form-group">
                                    <label htmlFor="courseId1">First Course</label>
                                    <select onChange = {this.handleOption} onClick={ this.handleInput} name="course one" className="form-control border-0 w-75" id="courseId1">
                                            <option selected disabled>choose one</option>
                                        {this.state.courses1.map((course,index)=>(
                                            <option key={index} value= {course.id}>{course.course_name}</option>
                                        ))}
                                    </select>
                                    {this.state.errors.courseId1 &&
                                    (<div className="alert alert-danger mt-1 rounded-pill py-0 w-75">{this.state.cerrors.courseId1}</div>)}
                                </div>

                                <div className="form-group">
                                    <label htmlFor="courseId2">Second course</label>
                                    <select onClick={this.handleInput} name="course two" className="form-control border-0 w-75" id="courseId2">
                                            <option selected disabled>choose one</option>
                                            <option value = " ">None</option>
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
