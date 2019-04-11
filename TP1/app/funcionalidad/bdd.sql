# drop database tp1;
create database tp1;
use tp1;

# drop table productos;
create table productos (
  id int(10) primary key auto_increment,
  nombre varchar(191),
  autor varchar(191),
  editorial varchar(191),
  descripcion text,
  stock int(10),
  precio double
);

# drop table usuarios;
create table usuarios (
  id int(10) primary key auto_increment,
  nombre varchar(191),
  clave varchar(191),
  email varchar(191)
);

# drop table compras;
create table compras (
  id int(10) primary key auto_increment,
  id_usuario int(10),
  precio_final double
);
ALTER TABLE compras ADD CONSTRAINT fk_usuario_id FOREIGN KEY (id_usuario) REFERENCES usuarios (id);

# drop table detalles_compras;
create table detalles_compras (
  id int(10) primary key auto_increment,
  id_compra int(10),
  id_producto int(10),
  cantidad int(10),
  precio_unitario double
);
ALTER TABLE detalles_compras ADD CONSTRAINT fk_compra_id FOREIGN KEY (id_compra) REFERENCES compras (id);
ALTER TABLE detalles_compras ADD CONSTRAINT fk_producto_id FOREIGN KEY (id_producto) REFERENCES productos (id);

insert into usuarios values (1, 'pepe', 'clavepepe', 'pepe@gmail.com');
insert into usuarios values (2, 'carlos', 'clavecarlos', 'carlos@gmail.com');
insert into productos values (1, 'Ingenieria de Software', 'Sommerville', 'Pearson', 'El libro favorito de marta', 10, 1500);
insert into productos values (2, 'Ingeniería de Software - Un Enfoque Práctico', 'R. Pressman', 'McGraw Hill', 'El otro libro favorito de marta', 2, 2000);
insert into productos values (3, 'Core PHP', 'Leon Atkinson', 'Pearson', 'Todo lo que querias saber de PHP', 0, 790);
insert into productos values (4, 'Computer Networking- A Top-Down approach (6th Edition)', 'J. F. Kurose', 'Pearson', 'A Ricardo Lopez le gusta esto', 7, 1489);
insert into productos values (5, 'Diseño conceptual de bases de datos', 'C. Batini', 'Addison-Wesley', 'A Gabriel Ingravallo le gusta esto', 4, 1129);
