document.addEventListener("DOMContentLoaded", () => {

    // Cargar las muestras desde la API cuando la página se carga
    const cargarUsuarios = async () => {
        try {
            let response = await fetch("http://localhost/Anatomia/public/api/v3/usuarios/listar");
            if (!response.ok) throw new Error(`Error al cargar las muestras: ${response.status}`);

            let usuarios = await response.json();
            actualizarMuestrasEnDOM(usuarios);
        } catch (error) {
            console.error("Error:", error);
        }
    };

    cargarUsuarios();

    const actualizarMuestrasEnDOM = (usuarios) => {
        const container = document.querySelector(".container .row");
        container.innerHTML = "";
        usuarios.forEach(usuario => agregarMuestraAlDOM(usuario));
    };

    const agregarMuestraAlDOM = (usuario) => {
        const container = document.querySelector(".container .row");
        const div = document.createElement("div");
        div.classList.add("col-md-4", "mt-8");
        div.innerHTML = `
            <div class="border border-dark p-2 rounded-lg shadow-md bg-white">
                <p><strong>Nombre:</strong> ${usuario.name}</p>
                <p><strong>Email:</strong> ${usuario.email}</p>
            </div>`;

        container.appendChild(div);     
    };

});