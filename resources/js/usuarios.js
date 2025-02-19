document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "http://localhost/Anatomia/public/";

    const cargarUsuarios = async () => {
        try {
            let response = await fetch(`${BASE_URL}api/v3/usuarios/listar`);
            if (!response.ok) throw new Error(`Error al cargar los usuarios: ${response.status}`);

            let usuarios = await response.json();
            actualizarUsuariosEnDOM(usuarios);
        } catch (error) {
            console.error("Error:", error);
        }
    };

    cargarUsuarios();

    const actualizarUsuariosEnDOM = (usuarios) => {
        const container1 = document.querySelector(".container1 .row1");
        container1.innerHTML = "";
        usuarios.forEach(usuario => agregarUsuarioAlDOM(usuario));
    };

    const agregarUsuarioAlDOM = (usuario) => {
        const container1 = document.querySelector(".container1 .row1");
        const div = document.createElement("div");
        div.classList.add("col-md-4", "mt-8");
        div.innerHTML = `
            <div class="border border-dark p-2 rounded-lg shadow-md bg-white">
                <p><strong>Nombre:</strong> ${usuario.name}</p>
                <p><strong>Email:</strong> ${usuario.email}</p>
            </div>`;

        container1.appendChild(div);     
    };

});