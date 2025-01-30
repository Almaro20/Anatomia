import React from 'react';         
import Navbar from './components/Navbar';      
import Sidebar from './components/Sidebar';    
import MainContent from './components/MainContent';  
import Footer from './components/Footer';     
import './App.css';  

const App = () => {
  return (
    <div className="app">
      {/* Barra de navegación */}
      <Navbar />
      
      {/* Barra lateral (sidebar) */}
      <Sidebar />

      {/* Contenido principal */}
      <MainContent />

      {/* Pie de página */}
      <Footer />
    </div>
  );
}

export default App;

