import { createRoot } from 'react-dom/client'
import './index.css'
import Cards from '../components/Cards'
import Sidebar from '../components/Sidebar'
import Navbar from '../components/Navbar'
import MainContent from '../components/MainContent'
import Footer from '../components/Footer'


createRoot(document.getElementById('root')).render(
    <>
        < Sidebar/>
        < Navbar/>
        < MainContent/>
        < Cards/>
        < Footer/>
    </>
)
