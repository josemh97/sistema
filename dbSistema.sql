create database verificacionapoyos;
use verificacionapoyos;

CREATE TABLE beneficiados (
idBeneficiado INT NOT NULL AUTO_INCREMENT,
nombre TEXT NOT NULL,
paterno TEXT,
materno TEXT,
direccion TEXT,
telefono TEXT,
rfc TEXT(20),
idDepartamento INT,
IdTipoApoyo INT(20),
fechaentrega DATE,
perentrega VARCHAR(20),
PRIMARY KEY (idBeneficiado)
)
ENGINE = innoDB;

CREATE TABLE departamento (
idDepartamento INT NOT NULL,
nomdep VARCHAR(20),
PRIMARY KEY (idDepartamento)
)
ENGINE = innoDB;

CREATE TABLE  tipoapoyo (
idTipoApoyo INT NOT NULL,
nomapoy VARCHAR(20),
PRIMARY KEY (idTipoApoyo)
)
ENGINE = innoDB;

CREATE TABLE usuarios (
    idUsu INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(30) PRIMARY KEY NOT NULL,
    password VARCHAR(256) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    departamento VARCHAR(100) NOT NULL,
    privilegio VARCHAR(50) NOT NULL
)
ENGINE = InnoDB;


ALTER TABLE beneficiados ADD CONSTRAINT FOREIGN KEY fk_bf_departamento (idDepartamento)
REFERENCES departamento (idDepartamento)
ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE beneficiados ADD CONSTRAINT FOREIGN KEY fk_bf_tipoapoyo (idTipoApoyo)
REFERENCES tipoapoyo (idTipoApoyo)
ON DELETE CASCADE ON UPDATE CASCADE; 

INSERT INTO `departamento` (`idDepartamento`, `nomdep`) VALUES 
('01', 'Obras Publicas'), ('02', 'Desarrollo Econ�mico'), 
('03', 'Educaci�n'), ('04', 'DIF'), ('05', 'Gesti�n Social'),
('06', 'Desarrollo Agropecuario'), ('07', 'Secretaria de Gobierno');

INSERT INTO `tipoapoyo` (`idTipoApoyo`, `nomapoy`) VALUES ('01', 'Cemento'), 
('02', 'Laminas'), ('03', 'Montenes'), ('04', 'Pinturas'), ('05', 'Despensas'), 
('06', 'Aparatos'), ('07', 'Econ�micos'), ('08', 'Granjas'), ('09', 'Semillas'), 
('10', 'Becas'), ('11', 'Medicamentos');

insert into usuarios values ('root', '123456', 'root', 'Obras Publicas', 'sAdministrador');
