import React from 'react';
import Navbar from './components/Navbar';
import Sidebar from './components/Sidebar';
import MainContent from './components/MainContent';
import Footer from './components/Footer';

const App = () => {
    return (
        <div className="wrapper">
            <Navbar />
            <Sidebar />
            <MainContent />
            <Footer />
        </div>
    );
};

export default App;
