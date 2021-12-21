--
-- OWASP Top 10解説のためのデータベース作成SQL
--
--
-- ========　最初はここから実行
-- OWASP解説用のデータベース作成
create database owasp;

-- owaspデータベース用ユーザーの作成と権限付与
CREATE USER 'owasp_user'@'localhost' IDENTIFIED BY 'owasp2017';
GRANT ALL ON owasp.* TO 'owasp_user'@'localhost'

-- ========　データの初期化のみをしたい場合は、ここから実行

-- SQLインジェクションデモ用テーブル
DROP TABLE IF EXISTS ORDERS;
CREATE TABLE ORDERS(
 NUM INT NOT NULL,
 USER VARCHAR(10),
 PRODUCT VARCHAR(10),
 AMOUNT INT,
 ORDERED_ON DATE,
 PRIMARY KEY(NUM)
);10
INSERT INTO ORDERS VALUES( 1, 'suzuki', 'CD', 1, '2009/07/01');
INSERT INTO ORDERS VALUES( 2, 'suzuki', 'CD', 2, '2009/07/02');
INSERT INTO ORDERS VALUES( 3, 'suzuki', 'CD', 3, '2009/07/03');
INSERT INTO ORDERS VALUES( 4, 'suzuki', 'CD', 4, '2009/07/04');
INSERT INTO ORDERS VALUES( 5, 'tanaka', 'CD', 1, '2009/07/01');
INSERT INTO ORDERS VALUES( 6, 'tanaka', 'CD', 2, '2009/07/02');
INSERT INTO ORDERS VALUES( 7, 'tanaka', 'CD', 3, '2009/07/03');
INSERT INTO ORDERS VALUES( 8, 'tanaka', 'CD', 4, '2009/07/04');
INSERT INTO ORDERS VALUES( 9, 'suzuki', 'CD', 1, '2009/07/01');
INSERT INTO ORDERS VALUES( 10, 'sato', 'CD', 3, '2009/07/11');
INSERT INTO ORDERS VALUES( 11, 'sato', 'CD', 4, '2009/07/12');
INSERT INTO ORDERS VALUES( 12, 'suzuki', 'BOOK', 1, '2009/07/01');
INSERT INTO ORDERS VALUES( 13, 'suzuki', 'DVD', 2, '2009/07/02');
INSERT INTO ORDERS VALUES( 14, 'suzuki', 'BOOK', 3, '2009/07/03');
INSERT INTO ORDERS VALUES( 15, 'suzuki', 'DVD', 4, '2009/07/04');
INSERT INTO ORDERS VALUES( 16, 'tanaka', 'BOOK', 1, '2009/07/01');
INSERT INTO ORDERS VALUES( 17, 'tanaka', 'DVD', 2, '2009/07/02');
INSERT INTO ORDERS VALUES( 18, 'tanaka', 'BOOK', 3, '2009/07/03');
INSERT INTO ORDERS VALUES( 19, 'tanaka', 'DVD', 4, '2009/07/04');
INSERT INTO ORDERS VALUES( 20, 'suzuki', 'BOOK', 1, '2009/07/01');
INSERT INTO ORDERS VALUES( 21, 'sato', 'DVD', 3, '2009/07/11');
INSERT INTO ORDERS VALUES( 22, 'sato', 'BOOK', 4, '2009/07/12');



-- Users table for A06
DROP TABLE IF EXISTS USERS;
CREATE TABLE USERS(
 NUM INT NOT NULL,
 NAME VARCHAR(10),
 PSW VARCHAR(256)
);
INSERT INTO USERS(NUM,NAME,PSW) VALUES(
 1,
 'aaa',
 'aaa'
);
INSERT INTO USERS(NUM,NAME,PSW) VALUES(
 2,
 'bbb',
 'bbb'
);
