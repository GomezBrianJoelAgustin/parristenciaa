CREATE DATABASE parristencia;

USE parristencia;

CREATE TABLE institutos (
    instituto_id INT AUTO_INCREMENT PRIMARY KEY,
    cue_instituto INT(10),
    nombre_instituto VARCHAR(100) UNIQUE,
    direccion_instituto VARCHAR(255) UNIQUE
);

CREATE TABLE materias (
    materia_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_materia VARCHAR(255),
    instituto_id INT,
    FOREIGN KEY (instituto_id) REFERENCES institutos(instituto_id)
);

CREATE TABLE alumnos ( 
    alumno_id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre_alumno VARCHAR(50), 
    apellido_alumno VARCHAR(50), 
    fecha_nacimiento_alumno DATE, 
    dni_alumno VARCHAR(10) UNIQUE,
    materia_id INT,
    FOREIGN KEY (materia_id) REFERENCES materias(materia_id)
);

CREATE TABLE profesores (
    profesor_id INT AUTO_INCREMENT PRIMARY KEY,
    apellido_profesor VARCHAR(50),
    nombre_profesor VARCHAR(50),
    dni_profesor VARCHAR(10) UNIQUE,
    legajo_profesor VARCHAR(20) UNIQUE,
    password_profesor VARCHAR(255)
);

CREATE TABLE asistencias (
    asistencia_id INT AUTO_INCREMENT PRIMARY KEY,
    alumno_id INT,
    materia_id INT,
    fecha DATE,
    FOREIGN KEY (alumno_id) REFERENCES alumnos(alumno_id),
    FOREIGN KEY (materia_id) REFERENCES materias(materia_id)
);

CREATE TABLE notas (
    nota_id INT AUTO_INCREMENT PRIMARY KEY,
    alumno_id INT,
    materia_id INT,
    nota1 DECIMAL(5,2),
    nota2 DECIMAL(5,2),
    nota3 DECIMAL(5,2),
    FOREIGN KEY (alumno_id) REFERENCES alumnos(alumno_id),
    FOREIGN KEY (materia_id) REFERENCES materias(materia_id)
);

CREATE TABLE ram (
    notaRegular DECIMAL(5,2),
    notaPromocion DECIMAL(5,2),
    porcentajeRegular DECIMAL(5,2),
    porcentajePromocion DECIMAL(5,2),
    instituto_id INT,
    FOREIGN KEY (instituto_id) REFERENCES institutos(instituto_id)
);

INSERT INTO institutos (cue_instituto, nombre_instituto, direccion_instituto) VALUES 
(1, 'Sedes', 'Luis N Palma');

INSERT INTO materias (nombre_materia, instituto_id) VALUES 
('Programacion', 1);

INSERT INTO ram (notaRegular, notaPromocion, porcentajeRegular, porcentajePromocion, instituto_id) VALUES 
(6, 7, 60, 70, 1);

INSERT INTO profesores (apellido_profesor, nombre_profesor, dni_profesor, legajo_profesor, password_profesor) VALUES 
('Parra', 'Javier', '1122', '2211', '123');


INSERT INTO alumnos (nombre_alumno, apellido_alumno, fecha_nacimiento_alumno, dni_alumno, materia_id) VALUES 
('Valentino', 'Andrade', '1999-03-12', '35123456', 1),
('Lucas', 'Cedres', '1998-09-07', '34876543', 1),
('Facundo', 'Figun', '2000-11-25', '40123789', 1),
('Luca', 'Giordano', '1997-06-02', '32456789', 1),
('Bruno', 'Godoy', '1999-01-18', '36789123', 1),
('Agustin', 'Gomez', '1996-04-30', '33567890', 1),
('Brian', 'Gonzalez', '1997-12-05', '35678901', 1),
('Federico', 'Guigou Scottini', '1998-08-15', '37890123', 1),
('Luna', 'Marrano', '1999-03-10', '38901234', 1),
('Giuliana', 'Mercado Aviles', '1995-10-22', '33345678', 1),
('Lucila', 'Mercado Ruiz', '1996-12-08', '32567890', 1),
('Angel', 'Murillo', '1998-02-27', '34890123', 1),
('Juan', 'Nissero', '1999-07-17', '36123456', 1),
('Fausto', 'Parada', '1997-11-06', '35234567', 1),
('Ignacio', 'Piter', '1996-05-19', '32789012', 1),
('Tomas', 'Planchon', '2000-09-03', '40456789', 1),
('Elisa', 'Ronconi', '1995-01-24','31678123' , 1 ),
('Exequiel','Sanchez','1998-04-11','33234567' , 1 ),
('Melina','Schimpf Baldo','1996-10-09','33789456' , 1 ),
('Diego','Segovia','1997-02-13','34567890' , 1 ),
('Camila','Sittner','1999-08-20','36456789' , 1 ),
('Yamil','Villa','1998-06-28','35345678' , 1 );

