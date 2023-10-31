create database `bd_lote_carros`;

use `bd_lote_carros`;

CREATE TABLE `cliente` (
  `id_cliente` int(9) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id_cliente`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `id_ventas_cliente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `extras` varchar(100) NOT NULL,
  `vin` int (11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `id_cliente` int(11) NOT NULL,
    PRIMARY KEY  (`id_ventas`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;