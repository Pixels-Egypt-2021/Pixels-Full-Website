import React from 'react';
import About from './Components/About';
import Articles from './Components/Articles';
import Header from './Components/Header';
import PixelsAdmin from './Components/PixelsAdmin';
import SeeMagazine from './Components/SeeMagazine';
import Sponsor from './Components/Sponsor';
import Statestics from './Components/Statestics';
import TimeLine from './Components/TimeLine';

function HomePage() {
    return (

<>
     <Header />
    <main>

        <About />
        <SeeMagazine />
        <Articles />
        <Statestics />
        <TimeLine />
        <PixelsAdmin />
        {/* <Sponsor /> */}
    </main>
</>

    );
}


export default HomePage;
