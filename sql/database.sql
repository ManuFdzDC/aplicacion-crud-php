CREATE TABLE cliente (
  codigo_cliente INTEGER NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(30) DEFAULT NULL,
  telefono VARCHAR(15) NOT NULL,
  fax VARCHAR(15) NOT NULL,
  linea_direccion1 VARCHAR(50) NOT NULL,
  linea_direccion2 VARCHAR(50) DEFAULT NULL,
  ciudad VARCHAR(50) NOT NULL,
  region VARCHAR(50) DEFAULT NULL,
  pais VARCHAR(50) DEFAULT NULL,
  codigo_postal VARCHAR(10) DEFAULT NULL,
  limite_credito NUMERIC(15,2) DEFAULT NULL,
  PRIMARY KEY (codigo_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cliente VALUES (1,'Daniel G','GoldFish','5556901745','5556901746','False Street 52 2 A',NULL,'San Francisco',NULL,'USA','24006',3000);
INSERT INTO cliente VALUES (3,'Anne','Wright','5557410345','5557410346','Wall-e Avenue',NULL,'Miami','Miami','USA','24010',6000);
INSERT INTO cliente VALUES (4,'Link','Flaute','5552323129','5552323128','Oaks Avenue nº22',NULL,'New York',NULL,'USA','85495',12000);
INSERT INTO cliente VALUES (5,'Akane','Tendo','55591233210','55591233211','Null Street nº69',NULL,'Miami',NULL,'USA','696969',600000);
INSERT INTO cliente VALUES (6,'Antonio','Lasas','34916540145','34914851312','C/Leganes 15',NULL,'Fuenlabrada','Madrid','Spain','28945',154310);
INSERT INTO cliente VALUES (7,'Jose','Bermejo','654987321','916549872','C/pintor segundo','Getafe','Madrid','Madrid','Spain','28942',20000);
INSERT INTO cliente VALUES (8,'Paco','Lopez','62456810','919535678','C/sinesio delgado','Madrid','Madrid','Madrid','Spain','28930',40000);
INSERT INTO cliente VALUES (9,'Guillermo','Rengifo','689234750','916428956','C/majadahonda','Boadilla','Madrid','Madrid','Spain','28947',32000);
INSERT INTO cliente VALUES (10,'David','Serrano','675598001','916421756','C/azores','Fuenlabrada','Madrid','Madrid','Spain','28946',50000);
INSERT INTO cliente VALUES (11,'Jose','Tacaño','655983045','916689215','C/Lagañas','Fuenlabrada','Madrid','Madrid','Spain','28943',20000);
INSERT INTO cliente VALUES (13,'Pedro','Camunas','34914873241','34914871541','C/Virgenes 45','C/Princesas 2 1ºB','San Lorenzo del Escorial','Madrid','Spain','28145',16481);



