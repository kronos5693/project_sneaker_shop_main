create database login;

use login;

create table usuarios (
id_usuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
username varchar(20) NOT NULL,
password char(32) NOT NULL,
email varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

select * from usuarios;

alter table usuarios add column fecha_alta timestamp;

alter table usuarios modify column fecha_alta timestamp default current_timestamp;

insert into usuarios values ('','pedro',MD5('890123'),'pedro@gmail.com','');

select * from usuarios where username in ('mariana','marina');

select password from usuarios where username='marcelo';

select * from usuarios where (username='marcelo' or email='marcelo@gmail.com') and (password='995bf053c4694e1e353cfd42b94e4447');

delete from usuarios where username='maria';

insert into usuarios values ('','micaela',MD5('mica'),'micaela@gmail.com',NULL);

update usuarios set password=md5('123456') where username='micaela'

select zapatillas.imagen,marcas.descripcion,zapatillas.modelo, zapatillas.precio,zapatillas.fecha_alta from zapatillas,marcas
where zapatillas.id_marca=marcas.id_marca;

insert into zapatillas (id_zapatilla,imagen,modelo,precio,id_marca,fecha_alta) values (NULL,'images/Nike_Md_Runner2.jpg','NIKE MD RUNNER 2',3600,1,NULL);

select zapatillas.imagen,marcas.descripcion,zapatillas.modelo, zapatillas.precio,date_format(zapatillas.fecha_alta,'%d/%m/%Y') from zapatillas,marcas
where zapatillas.id_marca=marcas.id_marca;

select z.imagen,m.descripcion,z.modelo, z.precio,date_format(z.fecha_alta,'%d/%m/%Y') from zapatillas z,marcas m
where z.id_marca=m.id_marca;



    
