-- Crear la base de datos
CREATE DATABASE materiales_construccion_db;

-- Usar la base de datos
USE materiales_construccion_db;

-- Crear la tabla de usuarios
CREATE TABLE usuarios(
    id_usuario INT auto_increment PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    contrasena VARCHAR(100) NOT NULL
);

INSERT INTO usuarios (nombre_usuario, contrasena) VALUES 
('eduar_perafan', '1234abcd'),
('vero_pajoy', 'abcd1234');

-- Crear la tabla de revestimientos
CREATE TABLE IF NOT EXISTS revestimientos(
    id_revestimiento INT auto_increment primary KEY,
    nombre_revestimiento VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    precio bigint NOT NULL
);

INSERT INTO revestimientos (nombre_revestimiento, tipo, precio) VALUES 
('Pintura Acrílica', 'Pintura', 250000),
('Cerámica Blanca', 'Cerámica', 300000),
('Azulejo Azul', 'Azulejo', 280000),
('Mármol Italiano', 'Mármol', 290000),
('Piedra Natural', 'Piedra', 350000);

-- Crear la tabla de porcelana sanitaria
CREATE TABLE porcelana_sanitaria(
    id_porcelana INT auto_increment PRIMARY KEY,
    nombre_porcelana VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    precio bigint NOT NULL
);

INSERT INTO porcelana_sanitaria (nombre_porcelana, tipo, precio) VALUES 
('Lavabo Circular', 'Lavabo', 400000),
('Inodoro Compacto', 'Inodoro', 500000),
('Bidé Clásico', 'Bidé', 450000),
('Lavamanos Moderno', 'Lavamanos', 550000),
('Inodoro Suspendido', 'Inodoro', 350000);

-- Verificar la base de datos y las tablas
SHOW DATABASES;
USE materiales_construccion_db;
SHOW TABLES;

-- Verificar la estructura de las tablas
DESCRIBE usuarios;
DESCRIBE revestimientos;
DESCRIBE porcelana_sanitaria;

-- Verificar el usuario creado
-- SELECT User, Host FROM mysql.user WHERE User = 'usuario_web';

select * from revestimientos;