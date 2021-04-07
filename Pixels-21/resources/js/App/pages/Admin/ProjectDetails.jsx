import React, { Component } from 'react';
import './forms.css';
import axios from 'axios';
import Joi from 'joi-browser';
import { toast } from 'react-toastify';


export default class ProjectDetails extends Component {

    state = {
        flag: false,
        cerrors : {
            title : "enter a valid title",
            description : "write the project description",
            img : "enter a valid img"
        },
        errors : {},
        req: {}
    }

    schema = {
        title: Joi.string().required(),
        description: Joi.string().required(),
        img: Joi.string().required()
    }

    handleInput = (e) => {

        let req = {...this.state.req , [e.target.name]: e.target.value};
        this.setState({req});

        if(this.state.flag){let errors = {};
        const result = Joi.validate(this.state.req , this.schema , {abortEarly : false});

        // {abortEarly : false}

        if(result.error === null ) {
            this.setState({ errors : {} });
            return null ;
        };

        for (let error of result.error.details ) {
            errors[error.path] = error.message;
        }
        this.setState({ errors });}
    }

    submit = async (e) => {
        e.preventDefault();
        this.setState({flag:true})
        let errors = {};
        const result = Joi.validate(this.state.req , this.schema , {abortEarly : false});

        if(result.error === null ) {
            this.setState({ errors : {} });
            let object = this.state.req;
            await axios.post('http://localhost:8000/api/project-details', object);
            
            this.setState({ req : {  } });
            
            toast.success("Submited Successfult");
            return null ;
        };

        for (let error of result.error.details ) {
            errors[error.path] = error.message;
        }

        this.setState({ errors });
    }

    render() {
        return (
            <form className="text-white">
                <h2 className="text-center">Project's main details </h2>

                <div className="form-group">
                    <label htmlFor="title">Project's Title</label>
                    <input onChange={this.handleInput} type="text" className="form-control rounded-pill border-0" value={this.state.req.title} name="title" id="title" placeholder="some of words" />
                    {this.state.errors.title &&
                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.title}</div>)}
                </div>
                <div className="form-group">
                    <label htmlFor="description">Description</label>
                    <textarea onChange={this.handleInput} className="form-control rounded border-0" value={this.state.req.description} name="description" id="description" rows="5"/>
                    {this.state.errors.description &&
                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.description}</div>)}
                </div>
                <div className="form-group">
                    <label htmlFor="img">img</label>
                    <input onChange={this.handleInput} type="text" className="form-control rounded-pill border-0" value={this.state.req.img} name="img" id="img" placeholder="pixels.jpg" />
                    {this.state.errors.img &&
                    (<div className="alert alert-danger mt-1 rounded-pill py-0">{this.state.cerrors.img}</div>)}
                </div>

                <button onClick={this.submit} type="submit" className="btn btn-block btn-outline-secondary rounded-pill mt-5">Submit</button>

            </form>
        )
    }
}
