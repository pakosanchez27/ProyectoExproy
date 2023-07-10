-- Creación de la tabla "Usuario"
CREATE TABLE Usuario (
  id_usuario INT PRIMARY KEY,
  correo VARCHAR(60),
  pass VARCHAR(60)
);

-- Creación de la tabla "Domicilio"
CREATE TABLE Domicilio (
  id_domicilio INT PRIMARY KEY,
  calle VARCHAR(50),
  ciudad VARCHAR(50),
  estado VARCHAR(60),
  codigo_postal VARCHAR(50),
  id_usuario INT
);

-- Creación de la tabla "Redes Sociales"
CREATE TABLE RedesSociales (
  id_red INT PRIMARY KEY,
  red_nombre VARCHAR(60),
  red_uri DATE,
  id_usuario INT
);

-- Creación de la tabla "Candidato"
CREATE TABLE Candidato (
  id_candidato INT PRIMARY KEY,
  can_nombre VARCHAR(30),
  can_apellido VARCHAR(30),
  can_telefono varchar(11),
  can_genero VARCHAR(50),
  can_fechaNacimiento DATE,
  can_fotoPerfil VARCHAR(50),
  can_fotoPortada VARCHAR(50),
  can_curriculum VARCHAR(50),
  can_acerca
  id_usuario INT
);
---------------------HOLA WORD JAJAJA-------------------------

-- Creación de la tabla "Idioma"
CREATE TABLE Idioma (
  id_idioma INT PRIMARY KEY,
  idioma_nombre VARCHAR(60),
  idioma_nivel varchar(30),
  id_candidato INT
);

-- Creación de la tabla "Insignias"
CREATE TABLE Insignias (
  id_insignia INT PRIMARY KEY,
  ins_nombre VARCHAR(60),
  ins_nivel INT(11),
  id_candidato INT
);

-- Creación de la tabla "Habilidad"
CREATE TABLE Habilidad (
  id_habilidad INT PRIMARY KEY,
  hab_nombre VARCHAR(60),
  id_candidato INT
);

-- Creación de la tabla "Educacion"
CREATE TABLE Educacion (
  id_educacion INT PRIMARY KEY,
  edu_nombre_institucion VARCHAR(50),
  edu_fecha_inicio DATE,
  edu_fecha_fin DATE,
  edu_titulo VARCHAR(60),
  edu_nivel VARCHAR(60),
  id_candidato INT
);

-- Creación de la tabla "Experiencia"
CREATE TABLE Experiencia (
  id_experiencia INT PRIMARY KEY,
  exp_nombre_empresa VARCHAR(60),
  exp_descripcion VARCHAR(60),
  exp_cargo VARCHAR(60),
  exp_duracion VARCHAR(50),
  id_candidato INT
);

-- Creación de la tabla "Proyectos"
CREATE TABLE Proyectos (
  id_proyecto INT PRIMARY KEY,
  proy_nombre VARCHAR(50),
  proy_descripcion VARCHAR(60),
  proy_tecnologia VARCHAR(60),
  proy_url VARCHAR(50),
  proy_foto VARCHAR(50),
  id_candidato INT
);

-- Creación de la tabla "Certificaciones"
CREATE TABLE Certificaciones (
  id_certificacion INT PRIMARY KEY,
  cer_nombre VARCHAR(50),
  cer_descripcion TEXT,
  cer_lugar VARCHAR(50),
  cer_fecha DATE,
  cer_horas INT(10),
  id_candidato INT
);
