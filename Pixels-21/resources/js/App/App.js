import React from 'react';
import ReactDOM from 'react-dom';
import { ToastContainer, toast } from 'react-toastify';

import 'react-toastify/dist/ReactToastify.css';
import './index.css';
// import App from './App';

import {
    BrowserRouter as Router,
    Switch,
    Route,
    Redirect
  } from "react-router-dom";


  import 'bootstrap/dist/css/bootstrap.min.css';
  import './App.css';

  import 'aos/dist/aos.css';

  import Navbar from './Components/NavbarComponent';
  import Footer from './Components/Footer';
  import HomePage from './pages/Home/HomePage';
  import EventsPage from './pages/EventsPage/EventsPage';
  import Magazine from './pages/Magazine/Magazine';
  import Error from './pages/Nomatched/Error';
  import Blogs from "./pages/Blogs/Blogs";
  import ProjectsContst from "./pages/projectAndCourses/ProjectsContst";
  import MiniEventForm from './pages/Forms/MiniEventForm';

import Projects from './pages/Admin/Projects';
import Project from './pages/projectAndCourses/Compoments/Project';
import Blog from './pages/Blogs/Components/Blog';
import InternalMiniEventForm from './pages/Forms/InternalMiniEventForm';

class App extends React.Component {
    render(){
        return (
            <Router>
                <Navbar />
                <ToastContainer />
                <Switch>
                    <Route path="/home">            <HomePage />                </Route>
                    <Route path="/project-contest"> <ProjectsContst />          </Route>
                    <Route path="/project/:id">     <Project />                 </Route>
                    <Route path="/blogs">           <Blogs />                   </Route>
                    <Route path="/blog/:id">        <Blog />                    </Route>
                    <Route path="/pixels-events">   <EventsPage />              </Route>
                    <Route path="/magazine">        <Magazine />                </Route>
                    <Route path="/gap">             <MiniEventForm />           </Route>
                    <Route path="/gap-internal">    <InternalMiniEventForm />   </Route>
                    <Route path="/adminx-projects"> <Projects />                </Route>
                    <Redirect exact from="/" to="/home" />
                    <Route >
                        <Error />
                    </Route>
                </Switch>
                <Footer />
            </Router>
        );
    }
}

ReactDOM.render(<App />, document.getElementById("root"));

