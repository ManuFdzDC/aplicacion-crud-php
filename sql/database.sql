CREATE TABLE cliente (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(30) NOT NULL,
  telefono VARCHAR(15) NOT NULL,
  direccion VARCHAR(50),
  ciudad VARCHAR(50),
  pais VARCHAR(50) DEFAULT NULL,
  cp VARCHAR(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cliente (nombre, apellido, telefono, direccion, ciudad, pais, cp)
VALUES 
('Daniel G','GoldFish','5556901745','False Street 52 2 A','San Francisco','USA','24006'),
('Anne','Wright','5557410345','Wall-e Avenue','Miami','USA','24010'),
('Link','Flaute','5552323129','Oaks Avenue nº22','New York','USA','85495'),
('Akane','Tendo','55591233210','Null Street nº69','Miami','USA','696969'),
('Antonio','Lasas','916540145','C/Leganes 15','Fuenlabrada','Spain','28945'),
('Jose','Bermejo','654987321','C/pintor segundo','Madrid','Spain','28942'),
('Paco','Lopez','62456810','C/sinesio delgado','Madrid','Spain','28930'),
('Guillermo','Rengifo','689234750','C/majadahonda','Madrid','Spain','28947'),
('David','Serrano','675598001','C/azores','Madrid','Spain','28946'),
('Jose','Tacaño','655983045','C/Lagañas','Madrid','Spain','28943'),
('Pedro','Camunas','914873241','C/Virgenes 45','Madrid','Spain','28145');