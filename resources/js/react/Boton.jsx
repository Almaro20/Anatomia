/* eslint-disable react/prop-types */
/* eslint-disable no-unused-vars */
import React from 'react'

const Boton = (props) => {

  return (
    <>

  <button 
      onClick={props.funcion} 
      style={{ 
      backgroundColor: 'green', 
      color: 'white', 
      padding: '10px 20px', 
      borderRadius: '25px', 
      border: 'none', 
      cursor: 'pointer' 
    }}
>
  {props.operacion}
</button>
    </>
  )

}

export default Boton
