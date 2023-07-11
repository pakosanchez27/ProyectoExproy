-- Creación de la tabla "Usuario"
CREATE TABLE Usuario (
  id_usuario INT(11) PRIMARY KEY AUTO_INCREMENT,
  correo VARCHAR(60),
  pass VARCHAR(60)
);

-- Creación de la tabla "Domicilio"
CREATE TABLE Domicilio (
  id_domicilio INT(11) PRIMARY KEY AUTO_INCREMENT,
  calle VARCHAR(50),
  ciudad VARCHAR(50),
  estado VARCHAR(60),
  codigo_postal VARCHAR(50),
  id_usuario INT(11),
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creación de la tabla "Redes Sociales"
CREATE TABLE RedesSociales (
  id_red INT PRIMARY KEY AUTO_INCREMENT,
  red_nombre VARCHAR(60),
  red_uri DATE,
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creación de la tabla "Candidato"
CREATE TABLE Candidato (
  id_candidato INT PRIMARY KEY AUTO_INCREMENT,
  can_nombre VARCHAR(30),
  can_apellido VARCHAR(30),
  can_telefono varchar(11),
  can_genero VARCHAR(50),
  can_fechaNacimiento DATE,
  can_fotoPerfil VARCHAR(50),
  can_fotoPortada VARCHAR(50),
  can_curriculum VARCHAR(50),
  can_acerca TEXT,
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creación de la tabla "Idioma"
CREATE TABLE Idioma (
  id_idioma INT PRIMARY KEY AUTO_INCREMENT,
  idioma_nombre VARCHAR(60),
  idioma_nivel varchar(30),
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creación de la tabla "Insignias"
CREATE TABLE Insignias (
  id_insignia INT PRIMARY KEY AUTO_INCREMENT,
  ins_nombre VARCHAR(60),
  ins_nivel INT(11),
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creación de la tabla "Habilidad"
CREATE TABLE Habilidad (
  id_habilidad INT PRIMARY KEY AUTO_INCREMENT,
  hab_nombre VARCHAR(60),
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creación de la tabla "Educacion"
CREATE TABLE Educacion (
  id_educacion INT PRIMARY KEY AUTO_INCREMENT,
  edu_nombre_institucion VARCHAR(50),
  edu_fecha_inicio DATE,
  edu_fecha_fin DATE,
  edu_titulo VARCHAR(60),
  edu_nivel VARCHAR(60),
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creación de la tabla "Experiencia"
CREATE TABLE Experiencia (
  id_experiencia INT PRIMARY KEY AUTO_INCREMENT,
  exp_nombre_empresa VARCHAR(60),
  exp_descripcion VARCHAR(60),
  exp_cargo VARCHAR(60),
  exp_duracion VARCHAR(50),
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creación de la tabla "Proyectos"
CREATE TABLE Proyectos (
  id_proyecto INT PRIMARY KEY AUTO_INCREMENT,
  proy_nombre VARCHAR(50),
  proy_descripcion VARCHAR(60),
  proy_tecnologia VARCHAR(60),
  proy_url VARCHAR(50),
  proy_foto VARCHAR(50),
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creación de la tabla "Certificaciones"
CREATE TABLE Certificaciones (
  id_certificacion INT PRIMARY KEY AUTO_INCREMENT,
  cer_nombre VARCHAR(50),
  cer_descripcion TEXT,
  cer_lugar VARCHAR(50),
  cer_fecha DATE,
  cer_horas INT(10),
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);



-- Empresas

-- Creacion de la tabla "Empresa"
CREATE TABLE Empresa (
  id_empresa INT(11) PRIMARY KEY AUTO_INCREMENT,
  emp_nombre VARCHAR(60),
  emp_apellido VARCHAR(60),
  emp_telefono VARCHAR(11),
  emp_empresa VARCHAR(60),
  emp_fotoPerfil VARCHAR(50),
  emp_fotoPortada VARCHAR(50),
  emp_acerca TEXT,
  emp_url VARCHAR(100),
  emp_fotoReclutador VARCHAR(50),
  id_usuario INT(11),
  FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario)
);

-- Creacion de la tabla "vacantes"

CREATE TABLE Vacante (
  id_vacante INT(11) PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(100),
  descripcion TEXT,
  salario DECIMAL(10, 2),
  ciudad VARCHAR(50),
  estado VARCHAR(50),
  area VARCHAR(50),
  puesto VARCHAR(50),
  educacion VARCHAR(100),
  tipo_contrato VARCHAR(50),
  horario VARCHAR(50),
  modo_trabajo VARCHAR(50),
  vencimiento DATE,
  numero_vacantes INT(11),
  id_empresa INT(11),
  FOREIGN KEY (id_empresa) REFERENCES Empresa (id_empresa)
);

