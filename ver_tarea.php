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
        <h1 class="titulo">VER UNA TAREA</h1>

        <form class="formulario" id="formulario_actualizar">
            <div class="form_control_container">
                <label for="input_nombre">Nombre de tarea</label>
                <input type="text" name="input_nombre" id="input_nombre" disabled>
            </div>

            <div class="form_control_container">
                <label for="input_status">Estatus:</label>
                <input type="text" name="input_status" id="input_status" disabled></input>
            </div>

            <div class="form_control_container">
                <label for="input_prioridad">Prioridad:</label>
                <input type="text" name="input_prioridad" id="input_prioridad" disabled></input>
            </div>

            <div class="form_control_container">
                <label for="input_descripcion">Descripción:</label>
                <textarea name="input_descripcion" rows="3" id="input_descripcion" disabled></textarea>
            </div>

            <div class="form_pie">
                <a class="boton boton_danger" href="./index.php" style="margin-right: 10px;">Regresar</a>
            </div>
        </form>
    </main>

    <script>
        let estatuses = [];
        let prioridades = [];
        const url = "./php/crud";

        const traerEstatuses = async () => {
            const urlMetodo = `${url}/obtenerTareasStatus.php`;
            const respuesta = await fetch(urlMetodo);
            estatuses = await respuesta.json();
        };

        const traerPrioridades = async () => {
            const urlMetodo = `${url}/obtenerTareasPrioridades.php`;
            const respuesta = await fetch(urlMetodo);
            prioridades = await respuesta.json();
        };

        const traerTarea = async () => {
            const urlMetodo = `${url}/obtenerUnaTarea.php?tarea_id=${<?=$_GET['tarea_id'];?>}`;
            const respuesta = await fetch(urlMetodo);
            let tarea = await respuesta.json();
            document.getElementById("input_nombre").value = tarea.nombre;
            document.getElementById("input_status").value = estatuses.find(estatus => estatus.id == tarea.estatus_id).nombre;
            document.getElementById("input_prioridad").value = prioridades.find(prioridad => prioridad.id == tarea.prioridad_id).nombre;
            document.getElementById("input_descripcion").value = tarea.descripcion;
        };

        document.addEventListener("DOMContentLoaded", async () => {
            await traerEstatuses();
            await traerPrioridades();
            await traerTarea();
        });
    </script>
</body>

</html>