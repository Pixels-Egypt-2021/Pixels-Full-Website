import React from 'react';
import Header from './Components/Header';
import Questions from './Components/Questions';
import Slogan from './Components/Slogan';
import WorkFlow from './Components/WorkFlow';
import './AboutStyles.css';
export default function AboutPage() {
  return (
    <>
      <Header/>
      <Slogan/>
      <WorkFlow />
      <Questions/>
    </>
  )
}