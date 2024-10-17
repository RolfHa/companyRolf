DROP DATABASE IF EXISTS firmaNeu;
CREATE DATABASE firmaNeu;
USE firmaNeu;
CREATE TABLE mitarbeiter (
                               id int(11) NOT NULL AUTO_INCREMENT,
                               firstName varchar(45) NOT NULL,
                               lastName varchar(45) NOT NULL,
                               gender varchar(10) NOT NULL,
                               salary decimal(6,2) NOT NULL,
                               PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
CREATE TABLE auto (
                             id int(11) NOT NULL AUTO_INCREMENT,
                             numberPlate varchar(45) NOT NULL,
                             maker varchar(45) NOT NULL,
                             type varchar(45) NOT NULL,
                             PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO mitarbeiter VALUES(1, 'Peter', 'Pan', 'männlich', 2001.22);
INSERT INTO mitarbeiter VALUES(2, 'Claudia', 'Clein', 'weiblich', 3009.22);
INSERT INTO auto VALUES(1, 'B-BQ 1', 'BMW', '333i');
INSERT INTO auto VALUES(2, 'B-BQ 12', 'VW', 'Golf');
--