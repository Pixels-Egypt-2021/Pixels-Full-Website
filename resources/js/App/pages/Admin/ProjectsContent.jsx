import React, { Component } from 'react';
import './forms.css';
import axios from 'axios';
import { toast } from 'react-toastify';


export default class ProjectsContent extends Component {

    state = {
        projects : [],
        req: {}
    }


    async componentDidMount(){
        console.log("wellcomeDidMount");
        const { data }  = await axios.get('http://localhost:8000/api/get-project-details') ;
        this.setState({projects : [...data.project]});
    }

    handleInput = (e) => {

        let req = {...this.state.req , [e.target.id]: e.target.value};
        this.setState({req});
    }

    submit = async (e) => {
        e.preventDefault();

        let object = this.state.req;
        await axios.post('http://localhost:8000/api/projects-content', object);

        this.setState({req : { }});

        toast.success("Submited Successfult");
    }

    render() {
        return (
            <form className="text-white">
            <h2 className="text-center">Add project secttion project</h2>

            <div className="form-group">
                <label htmlFor="title">Title</label>
                <input onChange={this.handleInput} type="text" value={this.state.req.title} className="form-control rounded-pill border-0" name="title" id="title" placeholder="ex:Section one" />
            </div>
            <div className="form-group">
                <label htmlFor="title_link">Title link</label>
                <input onChange={this.handleInput} type="text" className="form-control rounded-pill border-0" name="title_link" id="title_link" placeholder="https://google.com" />
            </div>
            <div className="form-group">
                <label htmlFor="title_link">Content of this section</label>
                <textarea onChange={this.handleInput} type="text" className="form-control rounded border-0" name="body" id="body" placeholder="content of this section" />
            </div>
            <div className="form-group">
                <label htmlFor="img">img</label>
                <input onChange={this.handleInput} type="text" className="form-control rounded-pill border-0" name="img" id="img" placeholder="pixels.jpg" />
            </div>

            <div className="form-group">
                <label htmlFor="video_link">Video Link</label>
                <input onChange={this.handleInput} type="text" className="form-control rounded-pill border-0" name="video_link" id="video_link" placeholder="must be embed link" />
            </div>

            <div className="form-group">
                <label htmlFor="code">code</label>
                <textarea onChange={this.handleInput} type="text" className="form-control rounded border-0" name="code" id="code" placeholder="source code" />
            </div>

            <div className="form-group">
                <label htmlFor="code_lang">code_lang</label>
                <input onChange={this.handleInput} type="text" className="form-control rounded-pill border-0" name="code_lang" id="code_lang" placeholder="the language of this code" />
            </div>

            <div className="form-group">
                <label htmlFor="courseId1">Select Project name</label>
                <select onChange = {this.handleInput}  name="course one" className="form-control border-0 " id="project_id">
                        <option selected disabled>select one</option>
                    {this.state.projects.map((project,index)=>(
                        <option key={index} value= {project.id}>{project.title}</option>
                    ))}
                </select>
            </div>

            <button onClick={this.submit} type="submit" className="btn btn-block btn-outline-secondary rounded-pill mt-5">Submit</button>

        </form>
        )
    }
}
