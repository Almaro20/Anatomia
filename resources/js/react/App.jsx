import React from 'react';
import Navbar from './Navbar';
import Sidebar from './Sidebar';
import MainContent from './MainContent';
import Footer from './Footer';

const App = () => {
  return (
    <div className="wrapper">
      <Navbar />
      <Sidebar />
      <div className="content-wrapper">
        <div className="content-header">
          <div className="container-fluid">
            <div className="row mb-2">
              <div className="col-sm-6"></div>
            </div>
          </div>
        </div>

        <MainContent />

        <Footer />
      </div>
    </div>
  );
}

export default App;
