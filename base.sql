CREATE TABLE USUARIO (
  ID_USUARIO INT(11) PRIMARY KEY AUTO_INCREMENT,
  CORREO VARCHAR(60),
  PASS VARCHAR(60)
);

CREATE TABLE DOMICILIO (
  ID_DOMICILIO INT(11) PRIMARY KEY AUTO_INCREMENT,
  CALLE VARCHAR(50),
  CIUDAD VARCHAR(50),
  ESTADO VARCHAR(60),
  CODIGO_POSTAL VARCHAR(50),
  ID_USUARIO INT(11),
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE REDESSOCIALES (
  ID_RED INT PRIMARY KEY AUTO_INCREMENT,
  RED_NOMBRE VARCHAR(60),
  RED_URI DATE,
  ID_USUARIO INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE CANDIDATO (
  ID_CANDIDATO INT PRIMARY KEY AUTO_INCREMENT,
  CAN_NOMBRE VARCHAR(30),
  CAN_APELLIDO VARCHAR(30),
  CAN_TELEFONO VARCHAR(11),
  CAN_GENERO VARCHAR(50),
  CAN_FECHANACIMIENTO DATE,
  AREA VARCHAR(50),
  PUESTO VARCHAR(50),
  CAN_FOTOPERFIL VARCHAR(50),
  CAN_FOTOPORTADA VARCHAR(50),
  CAN_CURRICULUM VARCHAR(50),
  CAN_ACERCA TEXT,
  ID_USUARIO INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE IDIOMA (
  ID_IDIOMA INT PRIMARY KEY AUTO_INCREMENT,
  IDIOMA_NOMBRE VARCHAR(60),
  IDIOMA_NIVEL VARCHAR(30),
  ID_USUARIO INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE INSIGNIAS (
  ID_INSIGNIA INT PRIMARY KEY AUTO_INCREMENT,
  INS_NOMBRE VARCHAR(60),
  INS_NIVEL INT(11),
  ID_USUARIO INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE HABILIDAD (
  ID_HABILIDAD INT PRIMARY KEY AUTO_INCREMENT,
  HAB_NOMBRE VARCHAR(60),
  ID_USUARIO INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE EDUCACION (
  ID_EDUCACION INT PRIMARY KEY AUTO_INCREMENT,
  EDU_NOMBRE_INSTITUCION VARCHAR(50),
  EDU_FECHA_INICIO DATE,
  EDU_FECHA_FIN DATE,
  EDU_TITULO VARCHAR(60),
  EDU_NIVEL VARCHAR(60),
  ID_USUARIO INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE EXPERIENCIA (
  ID_EXPERIENCIA INT PRIMARY KEY AUTO_INCREMENT,
  EXP_NOMBRE_EMPRESA VARCHAR(60),
  EXP_DESCRIPCION TEXT,
  EXP_CARGO VARCHAR(60),
  EXP_DURACION VARCHAR(50),
  ID_USUARIO INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE PROYECTOS (
  ID_PROYECTO INT PRIMARY KEY AUTO_INCREMENT,
  PROY_NOMBRE VARCHAR(50),
  PROY_DESCRIPCION VARCHAR(60),
  PROY_TECNOLOGIA VARCHAR(60),
  PROY_URL VARCHAR(50),
  PROY_FOTO VARCHAR(50),
  ID_USUARIO INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE CERTIFICACIONES (
  ID_CERTIFICACION INT PRIMARY KEY AUTO_INCREMENT,
  CER_NOMBRE VARCHAR(50),
  CER_DESCRIPCION TEXT,
  CER_LUGAR VARCHAR(50),
  CER_FECHA DATE,
  CER_HORAS INT(10),
  ID_USUARIO INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE EMPRESA (
  ID_EMPRESA INT(11) PRIMARY KEY AUTO_INCREMENT,
  EMP_NOMBRE VARCHAR(60),
  EMP_APELLIDO VARCHAR(60),
  EMP_TELEFONO VARCHAR(11),
  EMP_EMPRESA VARCHAR(60),
  EMP_FOTOPERFIL VARCHAR(50),
  EMP_FOTOPORTADA VARCHAR(50),
  EMP_ACERCA TEXT,
  EMP_URL VARCHAR(100),
  EMP_FOTORECLUTADOR VARCHAR(50),
  ID_USUARIO INT(11),
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE VACANTE (
  ID_VACANTE INT(11) PRIMARY KEY AUTO_INCREMENT,
  TITULO VARCHAR(100),
  DESCRIPCION TEXT,
  SALARIO DECIMAL(10, 2),
  CIUDAD VARCHAR(50),
  ESTADO VARCHAR(50),
  AREA VARCHAR(50),
  PUESTO VARCHAR(50),
  EDUCACION VARCHAR(100),
  TIPO_CONTRATO VARCHAR(50),
  HORARIO VARCHAR(50),
  MODO_TRABAJO VARCHAR(50),
  VENCIMIENTO DATE,
  NUMERO_VACANTES INT(11),
  ID_EMPRESA INT(11),
  FOREIGN KEY (ID_EMPRESA) REFERENCES EMPRESA (ID_EMPRESA)
);