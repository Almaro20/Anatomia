import { createRoot } from 'react-dom/client'
import './index.css'
import Principal from './Principal.jsx'
import Sexo from './sexo.jsx'

createRoot(document.getElementById('root')).render(
    <>
        <Principal />
        <Sexo />
    </>
)