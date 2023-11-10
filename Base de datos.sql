Base de datos
    Nombre: tareas_app

    Modelo:
        - tareas
            - id int
            - nombre varchar(250)
            - descripcion text(1000)
            - prioridad_id int
            - estatus_id int
            - created_at datetime
            - updated_at datetime
    
        - tareas_prioridad
            - id int
            - nombre varchar(250)

        - tareas_status
            - id int
            - nombre varchar(250)

    SQL:
        CREATE DATABASE tareas_app;

        USE tareas_app;

        CREATE TABLE tareas_prioridad (
            id INT NOT NULL AUTO_INCREMENT,
            nombre VARCHAR(250) NOT NULL,
            PRIMARY KEY (id)
        );

        CREATE TABLE tareas_status (
            id INT NOT NULL AUTO_INCREMENT,
            nombre VARCHAR(250) NOT NULL,
            PRIMARY KEY (id)
        );

        CREATE TABLE tareas (
            id INT NOT NULL AUTO_INCREMENT,
            nombre VARCHAR(250) NOT NULL,
            descripcion TEXT(1000) NOT NULL,
            prioridad_id INT NOT NULL,
            estatus_id INT NOT NULL,
            created_at DATETIME NOT NULL,
            updated_at DATETIME NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (prioridad_id) REFERENCES tareas_prioridad(id),
            FOREIGN KEY (estatus_id) REFERENCES tareas_status(id)
        );