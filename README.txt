Day 2(B) 


--------------------------------------

Day 1(A)

DB: secure
User: secure
PASS : 1111

http://localhost

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


1.2.3.4
0000 0001  0000 0010   0000 0011  0000 0100
1111 1111  1111 1111   1111 1111  0000 0000
0000 0001  0000 0010   0000 0011  0000 0000 : 1.2.3.0


OSI-7 Layer

A Penguin Said That Noboy Drinks Pepsi

(L7)Application  : GUI                             ____Hi______      
(L6)Presentation : 문법검사                         ____Hi______
(L5)Session      : 로그인
	Session Initiation Protocol(VoIP)              _____Hi_____ 
Transport(TCP/UDP)                        _TCPHder_ ______Hi___ : Segment
Network                        ___IPHdr_  _TCPHder_ ______Hi___ : Packet
DataLink                __MAC__, ___IPHdr_  _TCPHder_ ______Hi__ : Frame
Physical

