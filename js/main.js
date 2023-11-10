let estatuses = [];
let prioridades = [];
const url = "./php/crud";

const traerEstatuses = async () => {
    const urlMetodo = `${url}/obtenerTareasStatus.php`;
    const respuesta = await fetch(urlMetodo);
    let tareasStatus = await respuesta.json();
    estatuses = tareasStatus;

    let options = `<option value="">...</option>`;

    for (let i = 0; i < tareasStatus.length; i++) {
        options += `<option value="${tareasStatus[i].id}">${tareasStatus[i].nombre}</option>`;
    }

    const inputStatus = document.getElementById('input_status');
    inputStatus.innerHTML = options;
};

const traerPrioridades = async () => {
    const urlMetodo = `${url}/obtenerTareasPrioridades.php`;
    const respuesta = await fetch(urlMetodo);
    let tareasPrioridades = await respuesta.json();
    prioridades = tareasPrioridades;

    let options = `<option value="">...</option>`;

    for (let i = 0; i < tareasPrioridades.length; i++) {
        options += `<option value="${tareasPrioridades[i].id}">${tareasPrioridades[i].nombre}</option>`;
    }

    const inputPrioridad = document.getElementById('input_prioridad');
    inputPrioridad.innerHTML = options;
};

const traerTareas = async () => {
    const urlMetodo = `${url}/obtenerTodasTareas.php`;
    const respuesta = await fetch(urlMetodo);
    let tareas = await respuesta.json();

    let tareasFinal = ``;

    for (let i = 0; i < tareas.length; i++) {
        tareasFinal += `
                    <div class="tarea">
                        <div class="tarea_cabeza">
                            <h2>${tareas[i].nombre}</h2>
                        </div>

                        <div class="tarea_cuerpo">
                            <p class="tarea_status"><strong>ESTATUS:</strong> ${estatuses.find(status => status.id == tareas[i].estatus_id).nombre}</p>
                            <p class="tarea_prioridad"><strong>PRIORIDAD:</strong> ${prioridades.find(prioridad => prioridad.id == tareas[i].prioridad_id).nombre}</p>
                            <p>${tareas[i].descripcion}</p>
                        </div>

                        <div class="tarea_pie">
                            <button class="boton boton_success" onclick="verTarea(${tareas[i].id})">
                                <i class="fa-solid fa-eye"></i> Ver
                            </button>

                            <button class="boton boton_danger" onclick="eliminarTarea(${tareas[i].id})">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>

                            <button class="boton boton_primary" onclick="editarTarea(${tareas[i].id})">
                                <i class="fa-solid fa-edit"></i> Editar
                            </button>
                        </div>
                    </div>
                `;
    }

    const tareasContenedor = document.getElementById('tareas_contenedor');
    tareasContenedor.innerHTML = tareasFinal;
};

const crearTarea = async () => {
    const urlMetodo = `${url}/crearUnaTarea.php`;
    const formularioData = new FormData(document.getElementById('formulario_crear'));

    const opciones = {
        method: 'POST',
        body: formularioData
    };

    const respuesta = await fetch(urlMetodo, opciones);
    alert("Se ha creado la tarea de forma satisfactoria.");
    traerTareas();
};

const formularioCrear = document.getElementById('formulario_crear');
formularioCrear.addEventListener('submit', (e) => {
    e.preventDefault();
    crearTarea();
});

const eliminarTarea = async (tareaId) => {
    const urlMetodo = `${url}/eliminarUnaTarea.php?tarea_id=${tareaId}`;
    const respuesta = await fetch(urlMetodo);
    alert("Se ha eliminado la tarea de forma satisfactoria.");
    traerTareas();
};

const editarTarea = (tareaId) => {
    window.location.href = `./editar_tarea.php?tarea_id=${tareaId}`;
};

const verTarea = (tareaId) => {
    window.location.href = `./ver_tarea.php?tarea_id=${tareaId}`;
};

document.addEventListener("DOMContentLoaded", async () => {
    await traerEstatuses();
    await traerPrioridades();
    await traerTareas();
});