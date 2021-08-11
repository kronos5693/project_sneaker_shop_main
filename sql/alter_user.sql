alter table usuarios add column Activo varchar(2) default 'Si';

insert into usuarios (username,password,email) values('mramos',md5('nomeacuerdo456'),'mramos@empresa.com');

select username, email, Activo from usuarios where username="mramos";