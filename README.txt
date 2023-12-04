DB: secure
User: secure
PASS : 1111


create table first (
	idx	int(10) auto_increment,
	id	char(10),
	name	char(10),
	primary key(idx)
);

create table users (
	idx	int(10) auto_increment,
	id	char(30) unique,
	name char(30),
	pass char(50),
	primary key(idx)
);

insert into users (id, name, pass) values ('test', '테스트', 'abcd');
insert into users (id, name, pass) values ('admin', '관리자', 'abcd');

create table bbs (
	idx	int(10) auto_increment,
	title	char(255),
	name char(30),
	content text,
	primary key(idx)
);

insert into bbs (title, name, content) 
		values ('제목1', '작성자1', '내용1');


insert into first (id, name) values ('test', '테스트');

다음 사이트에 접속해 코드가 잘 보이는지 확인해 주세요.

https://github.com/eurekasolution/kpc2312


void print(char *ptr)
{
	char buf[100];
	bzero(buf, sizeof(buf));
	strcpy(buf, ptr);
}
// run likes..
// ./test Hello
// ./test "hello world"
int main(int argc, char **argv)
{
	print(argv[1]);
	return 0;
}

sql = "select * from user where id='아이디' and pass='비번' ";
                                    aaaa' or 2>1 limit 2,1 -- 
