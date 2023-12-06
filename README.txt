Day 3(C)


7K
for()
{
	connect();
	insert();
	close();
}

120K
connect();
for()
{
	insert();	
}
close();

https://www.security.org/how-secure-is-my-password/


Why Connection Pool?

// http://localhost/main.php?cmd=test&age=12
create table logs (
	idx		int(10) 	auto_increment,
	ip 		char(20),
	name	char(30),
	work	char(255),
	time	datetime,
	primary key(idx)
);

alter table logs add time datetime;

--------------------------------------------
Day 2(B) 

코딩 양을 줄이기 위해 github에
다음의 코드를 미리 타이핑 해 놓았습니다.
	db.php
	main.php
	style.css

Bootstrap 참고 사이트
http://w3schools.com/bootstrap5

HTTP의 Response Code
(참고 구글 검색 : http rfc를 검색후 '404' 찾기)

1xx : Trying
2xx : OK
3xx : Temporary Error, Redirect Error
4xx : Permanent Error, Client Error
	400 : Bad Request
	401 : Unauthorized
	402 : Payment Required
	403 : Forbidden
	404 : Not Found
	405 : Method Not Allowed
	...

	enum { BadRequest = 400, Unauthorized, PaymentRequired, Forbidden, NotFound, MethodNotAllowed}
	https://www.daum.net/
5xx : Server Error
6xx : Global Error


javascript:alert(document.cookie);

SQL injection을 막으려면

	1. 자바스크립트와 login코드 양방향으로 검사
		a. 회원가입할 때 아이디에 '--', 작은따옴표('), space 를 사용못하게 막아야함.
		b. 비밀번호 '--', 작은따옴표(') 등은 사용하지 못하도록
	2. 자바스크립트는 정규식
	3. login처리할 때 특수문자, 특히 (--), >, < , = 기호를 무력화시키기

프로그램 다운로드

1. download burp suite (Web Proxy)

--------------------------------------

Day 1(A)

1. download xampp
2. download visual code

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

