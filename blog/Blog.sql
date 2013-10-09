drop database Blog;
create database Blog;
use Blog;

create table user(
	id int primary key auto_increment,
	name varchar(20) not null,
	pwd varchar(100) not null,
	lastLogTime varchar(20),
	lastLogIP varchar(50)
)engine=innoDB default charset=utf8 collate=utf8_unicode_ci;

create table category(
	id int primary key auto_increment,
	parent_id int,
	name varchar(20) not null
)engine=innoDB default charset=utf8 collate=utf8_unicode_ci;
	
create table article(
	id int primary key auto_increment,
	title text not null,
	user_id int,
	publishDate varchar(20),
	content text not null,
	category_id int,
	isDeleted int
)engine=innoDB default charset=utf8 collate=utf8_unicode_ci;



create table administrator(
	id int primary key auto_increment,
	name varchar(20) not null,
	pwd varchar(100) not null,
	lastLogTime varchar(20),
	lastLogIP varchar(50)	
)engine=innoDB default charset=utf8 collate=utf8_unicode_ci;