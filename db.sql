create table characters(
    id int not null auto_increment,
    name varchar(255),
    hability varchar(100),
    height double(250,0),
    age int(150),
	primary key(id),
    unique key `name`(`name`)
);
