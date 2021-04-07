import React, { useState } from 'react'
import ProjectDetails from './ProjectDetails';
import ProjectsContent from './ProjectsContent';

export default function Projects() {

    const [projects, setprojects] = useState([]);
    const [flag, setFlag] = useState(false);


    return (

        <section className="registration-page" >
            <div className=" container pt-5">

                <div className="row justify-content-center pt-5 h-100">
                    <div className= " col-md-6 m-lg-5 my-5 p-5 rounded align-self-center border form-style">
                        <div className="text-center mb-4">
                            <button onClick={()=>{setFlag(false)}}  className="btn btn-info mr-3">Main details</button>
                            <button onClick={()=>{setFlag(true)}} className="btn btn-secondary ">content</button>
                        </div>
                        {flag===true?
                            <ProjectsContent /> :
                            <ProjectDetails />
                        }

                    </div>
                </div>
            </div>
        </section>
    )
}
