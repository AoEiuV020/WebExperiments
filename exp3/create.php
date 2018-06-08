<?php
$con = mysqli_connect("127.0.0.1","root","rootlocal","","3306");
if (mysqli_connect_errno($con)) {
    die('Could not connect: ' . mysqli_connect_error());
}
if (mysqli_query($con, "create database if not exists web_db
    character set utf8mb4
    collate utf8mb4_unicode_ci;
")) {
    echo "Database created";
} else {
    echo "Error creating database: ";
}
mysqli_select_db($con,"web_db");
mysqli_query($con,"create table if not exists person (
    name    varchar(255) not null  primary key,
    address varchar(255) not null,
    zip     varchar(255) not null
);
");
mysqli_query($con,"create table if not exists book (
    book      varchar(255)   not null primary key,
    publisher varchar(255)   not null,
    price     decimal(10, 2) not null
);
");
mysqli_query($con,"create table if not exists `order` (
  id       integer primary key auto_increment,
  name     varchar(255) not null,
  book     varchar(255) not null,
  quantity integer      not null
);
");
mysqli_query($con,"INSERT INTO `book` (`book`, `publisher`, `price`) VALUES
    ('Web technology', 'Springer press', 5.0),
    ('mathematics', 'ACM press', 6.2),
    ('principle of OS', 'Science press', 10),
    ('Theory of matrix', 'High education press', 7.8);
");
mysqli_close($con);
?>
