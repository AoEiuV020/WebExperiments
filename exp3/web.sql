drop database if exists web_db;

create database if not exists web_db
  character set utf8mb4
  collate utf8mb4_unicode_ci;

use web_db;

create table if not exists person (
  name    varchar(255) not null  primary key,
  address varchar(255) not null,
  zip     varchar(255) not null
);

create table if not exists book (
  book      varchar(255)   not null primary key,
  publisher varchar(255)   not null,
  price     decimal(10, 2) not null
);

create table if not exists `order` (
  id       integer primary key auto_increment,
  name     varchar(255) not null,
  book     varchar(255) not null,
  quantity integer      not null
);

INSERT INTO `book` (`book`, `publisher`, `price`) VALUES
  ('Web technology', 'Springer press', 5.0),
  ('mathematics', 'ACM press', 6.2),
  ('principle of OS', 'Science press', 10),
  ('Theory of matrix', 'High education press', 7.8);

select * from `order` where name = "林恩怜";