CREATE DATABASE gestion_tareas;
USE gestion_tareas;

CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tareas (titulo, descripcion) VALUES 
('Ingresar compras', 'Ingresar en el sistema las compras realizadas'),
('Actualizar base de datos', 'Revisar y agregar nuevos cambios a la base de datos'),
('Inventariar', 'Hacer inventario de los productos en stock');