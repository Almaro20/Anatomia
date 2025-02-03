import { createRoot } from 'react-dom/client'
import './index.css'
<<<<<<< HEAD
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
=======
import Principal from './Principal.jsx'
import Sexo from './sexo.jsx'

createRoot(document.getElementById('root')).render(
    <>
        <Principal />
        <Sexo />
    </>
)
>>>>>>> 5fc0151b3ea71f24e8933f7b4aa5a18416e1a620
