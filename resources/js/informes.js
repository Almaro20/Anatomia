botonSiguiente = document.getElementById('vistainforme')
botonSiguiente.addEventListener('click', async () => {

    // Capturar los datos del formulario
    const datos = {
        codigo: document.getElementById('codigo').value,
        fecha: document.getElementById('fecha').value,
        naturaleza: document.getElementById('naturaleza').value,
        biopsia: document.getElementById('biopsia').value,
        conservacion: document.getElementById('conservacion').value,
        procedencia: document.getElementById('procedencia').value
    };

    try {
        const respuesta = await fetch('/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(datos)
        });

        const resultado = await respuesta.json();
        if (resultado.success) {
            alert('Informe guardado correctamente');
        } else {
            alert('Hubo un error al guardar el informe');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error en la conexión con el servidor');
    }
});