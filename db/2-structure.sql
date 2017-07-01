drop table if exists relation;
drop table if exists daily_data;
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
    speciality varchar(255) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;


create table daily_data (
    id integer not null primary key auto_increment,
    user_id integer not null,
    daily_date datetime null default null,
    physical_form enum('1', '2', '3', '4', '5') null,
    physical_form_desc text not null,
    psycho_form enum('1', '2', '3', '4', '5') null,
    psycho_form_desc text not null,
    pain enum('1', '2', '3', '4', '5') null,
    pain_desc text not null,
    temperature integer not null,
    weather varchar(255) not null,
    symptom varchar(255) not null,
    symptom_desc text not null,
    other_city varchar(255) not null,
    lunch varchar(255) not null,
    other varchar(255) not null,
    constraint fk_user_id foreign key(user_id) references users(id)
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table relation (
    id integer not null primary key auto_increment,
    user_id integer not null,
    medic_id integer not null,
    constraint fk_user_relation_id foreign key(user_id) references users(id),
    constraint fk_medic_relation_id foreign key(medic_id) references users(id)
) engine=innodb character set utf8 collate utf8_unicode_ci;