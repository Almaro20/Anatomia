// eslint-disable-next-line no-unused-vars
import React, { useState } from 'react'
import Boton from './Boton'

const Sexo = () => {

    const [sexo, setSexo] = useState('')

    const handleSexoChange = (event) => {
        setSexo(event.target.value)
    }

    const handleSubmit = (event) => {
        event.preventDefault()
        alert(`El sexo seleccionado es: ${sexo}`)
    }

    return (
        <>
            <div>

                <h1>Informes de sexo</h1>
                <p>El puto grupo de mierda</p>

                <form onSubmit={handleSubmit}>
                    <label>
                        Sexo:
                        <select value={sexo} onChange={handleSexoChange}>
                            <option value="">Seleccione una opción</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                    </label>
                    <button type="submit">Enviar</button>
                </form>

            </div>
        </>
    )
}

 
export default Sexo

