drop table if exists users;

create table users (
    id integer not null primary key auto_increment,
    pseudo varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    role varchar(255) not null,
    active enum('0','1') not null default '0',
	created_at datetime not null default CURRENT_TIMESTAMP,
    token varchar(255) not null,
    name varchar(255) not null,
    nickname varchar(255) not null,
    city varchar(255) not null,
    sexe varchar(15) not null,
    birthday datetime null default null,
    maladie varchar(255) not null,
    traitement varchar(255) not null,
    medic varchar(255) not null,
    speciality varchar(255) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;
