DB: secure
User: secure
PASS : 1111


create table first (
	idx	int(10) auto_increment,
	id	char(10),
	name	char(10),
	primary key(idx)
);

insert into first (id, name) values ('test', '테스트');
