-- Creamos primer schema
create schema ejemplo;

-- Crear una tabla
-- Ejemplo es el nombre del scquema en donde lo estamos generando
-- Contacto es el nombre de la tabla
Create table `ejemplo` . `contactos`(
	`id` int not null auto_increment,
    `nombre` varchar(64) not null,
    `apellidos` varchar(64) not null,
    `direccion` varchar(255) not null, 
    `celular` varchar(10) not null,
    `correo` varchar(255) not null, 
    -- permite nulos el siguiente, de hecho es el valor por defecto
    `fecha_nacimiento` date default null,
    -- Tinyint es como boolean
    `familia` tinyint default null,
    primary key(`id`)
);

-- Eliminar una tabla
Drop table `contactos`;

-- Insertar valores
insert into `ejemplo` . `contactos`
(`nombre`, `apellidos`, `direccion`, `celular`, `correo`, `fecha_nacimiento`, `familia`)
values ("Lucas", "Lopez", "cualquiera2", "7894561", "ll@gmail.com", "1991/01/01", 0);

-- Actualizar valores
Update `ejemplo` . `contactos`
set `nombre` = 'Luca'
where `id` = 1;

-- Eliminar un registro
Delete from `ejemplo` . `contactos`
where `id` = 2;

-- Crear indices
alter table `ejemplo` . `contactos`
add index(nombre);

-- Indice pero que toma solo los 20 primeros caracteres
alter table `ejemplo` . `contactos`
add index(nombre(20));

-- Creaos indices al momento de crear una tabla
Create table `ejemplo` . `otro`(
	`id` int not null auto_increment,
    `nombre` varchar(64) not null,
    `apellidos` varchar(64) not null,
    index(nombre),
    index(apellidos)
);

-- Indice fulltext, busquedas mas rapidas en una coleccion de texto
-- Se utilizan con textos mas complejas, palabras clave, frases
Alter table `ejemplo` . `contactos` 
add fulltext(direccion);


-- Para hacer index fulltext en una tabla completa
Create table `ejemplo` . `otro`(
	`id` int not null auto_increment,
    `nombre` varchar(64) not null,
    `apellidos` varchar(64) not null,
    index(nombre),
    fulltext(apellidos)
);

-- consultas sql
-- al igual que sl server, tenemos:
-- *, count(*), distinct, where, like, %
select nombre
from ejemplo.contactos;

-- Traer solo los dos primeros registros, se usa limit
select nombre
from ejemplo.contactos limit 2;

-- Uso de limit, traes a partir del registro 1, 2 elementos
select nombre
from ejemplo.contactos limit 1,2;

-- Sacar modo seguro del update
-- Si no se saca, en el where solo podemos filtrar por id
-- Para eso vamos a edit, preferencias, debaj del todo aparece un checkbox que dice safe Updates.
Update `ejemplo` . `contactos`
set `nombre` = 'Lucas'
where `nombre` = 'Luca';

-- Match against
-- Solamente podemos usarlo en tuplas que tienen el indice fulltext
select * from ejemplo.contactos
where match(direccion) against('cualquiera');

-- Order by
Select * 
from ejemplo.contactos
order by nombre desc; -- predeterminado asc;

-- Group by y having
-- agrupamos lo campos
Select  direccion, count(*) 
from ejemplo.contactos
group by direccion
having count(*) > 1;

-- Foreign key, igual a sql server
CREATE TABLE pedidos (
  id_pedido INT PRIMARY KEY,
  id_usuario INT,
  cantidad INT,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

-- Con alter table, forma generica
ALTER TABLE nombre_tabla
ADD CONSTRAINT nombre_constraint FOREIGN KEY (nombre_columna)
REFERENCES tabla_referenciada (columna_referenciada);

-- Join, left join
Create table ejemplo.nuevos(
	`id` int not null auto_increment,
    `nombre` varchar(64) not null,
    `apellidos` varchar(64) not null,
    PRIMARY KEY (`id`)
);

insert into `ejemplo` . `nuevos`
(`nombre`, `apellidos`)
values ("Javier", "Rodriguez");

-- Ejemplo de join o inner join, cruza la tabla contactos con nuevos
-- Igual funciona left join, rigth join
Select * 
from ejemplo.contactos
join nuevos on contactos.id = nuevos.id;

-- Funciones
-- Concatenar, hacemos que etsen en una sola columna
Select concat(nombre," ", apellidos) as 'Nombres' from contactos;

-- Asume que entre cada palabra tiene que haber un espacio
Select CONCAT_WS(" ", nombre, apellidos) as 'Nombres' from contactos;

-- Longitud de una determinada cadena
Select CONCAT_WS(" ", nombre, apellidos) as 'Nombres', direccion, length(direccion) as "Long dir"
from contactos;

-- Pasar todo a minuscula, es el lower
Select LOWER(CONCAT_WS(" ", nombre, apellidos)) as 'Nombres', direccion, length(direccion) as "Long dir"
from contactos;

-- Pasar todo a mayuscula, es el upper
Select UPPER(CONCAT_WS(" ", nombre, apellidos)) as 'Nombres', direccion, length(direccion) as "Long dir"
from contactos;

-- Remplazar un texto, no modifica la informacion, solo la muestra diferente
Select REPLACE(correo, 'gmail.com', 'hotmail.com') 
from contactos;

-- Eliminar espacios embebidos
Select TRIM(correo)
from contactos;

-- Cambio de formato de fechas, el % especifica que no es una cadena
Select DATE_FORMAT(fecha_nacimiento, '%d/%m/%y') as fecha_nacimiento
from contactos;

-- Si de la fecha solo quiero recuperar el dia
-- Se usa igual con month e year
Select DAY(fecha_nacimiento) as "Dia nacimiento"
from contactos