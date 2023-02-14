

insert into usuario (usuario, senha_usuario, nome,email)
values ('admin',md5('admin'),'Marcos','marcos.oliveira@rceit.com.br');

insert into usuario (usuario, senha_usuario, nome,email)
values ('admin1',md5('admin1'),'Marcos1','marcos1.oliveira1@rceit.com.br');




create table if not exists usuario(
    id integer unsigned not null auto_increment,
    usuario varchar(255) not null,
    senha_usuario varchar(255) not null,
    nome varchar(255) not null,
    email varchar(255) not null,

    primary key (id)
   
);
