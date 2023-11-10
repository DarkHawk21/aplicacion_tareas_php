<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Tareas PHP</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <main>
        <h1 class="titulo">EDITANDO UNA TAREA</h1>

        <form class="formulario" id="formulario_actualizar">
            <div class="form_control_container">
                <label for="input_nombre">Nombre de tarea</label>
                <input type="text" name="input_nombre" id="input_nombre">
            </div>

            <div class="form_control_container">
                <label for="input_status">Estatus:</label>
                <select name="input_status" id="input_status"></select>
            </div>

            <div class="form_control_container">
                <label for="input_prioridad">Prioridad:</label>
                <select name="input_prioridad" id="input_prioridad"></select>
            </div>

            <div class="form_control_container">
                <label for="input_descripcion">Descripción:</label>
                <textarea name="input_descripcion" rows="3" id="input_descripcion"></textarea>
            </div>

            <div class="form_control_container">
                <input type="hidden" name="input_tarea_id" id="input_tarea_id">
            </div>

            <div class="form_pie">
                <a class="boton boton_danger" href="./index.php" style="margin-right: 10px;">Cancelar / Regresar</a>
                
                <button class="boton boton_primary" type="submit">
                    <i class="fa-solid fa-edit"></i> Guardar
                </button>
            </div>
        </form>
    </main>

    <script>
        let estatuses = [];
        let prioridades = [];
        const url = "http://localhost/app_tareas_php/php/crud";

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

        const traerTarea = async () => {
            const urlMetodo = `${url}/obtenerUnaTarea.php?tarea_id=${<?=$_GET['tarea_id'];?>}`;
            const respuesta = await fetch(urlMetodo);
            let tarea = await respuesta.json();
            document.getElementById("input_nombre").value = tarea.nombre;
            document.getElementById("input_status").value = tarea.estatus_id;
            document.getElementById("input_prioridad").value = tarea.prioridad_id;
            document.getElementById("input_descripcion").value = tarea.descripcion;
            document.getElementById("input_tarea_id").value = tarea.id;
        };

        const actualizarTarea = async () => {
            const urlMetodo = `${url}/actualizarUnaTarea.php`;
            const formularioData = new FormData(document.getElementById('formulario_actualizar'));

            const opciones = {
                method: 'POST',
                body: formularioData
            };

            const respuesta = await fetch(urlMetodo, opciones);
            alert("Se ha actualizado la tarea de forma satisfactoria.");
            traerTarea();
        };

        const formularioActualizar = document.getElementById('formulario_actualizar');
        formularioActualizar.addEventListener('submit', (e) => {
            e.preventDefault();
            actualizarTarea();
        });

        document.addEventListener("DOMContentLoaded", async () => {
            await traerEstatuses();
            await traerPrioridades();
            await traerTarea();
        });
    </script>
</body>

</html>