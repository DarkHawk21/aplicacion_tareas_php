<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Tareas PHP</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
</head>
<body>
    <main>
        <h1 class="titulo">CRUD de Tareas</h1>
        
        <form class="formulario" id="formulario_crear">
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

            <div class="form_pie">
                <button class="boton boton_success" type="submit">
                    <i class="fa-solid fa-add"></i> Agregar
                </button>
            </div>
        </form>

        <section class="tareas_contenedor" id="tareas_contenedor"></section>
    </main>

    <script src="./js/main.js"></script>
</body>
</html>