<?php

// create tabels
/*
CREATE TABLE database_name.table_name(
   column1 datatype PRIMARY KEY(one or more columns),
   column2 datatype,
   column3 datatype,
   .....
   columnN datatype
);
*/

// $id in session!

$database->sql($sql['install']);
echo $database->sql($sql['get_name']);

$sql = array( // use phonenumber as unique $id
   'install' => "create table user if not excist(
      id int primary key auto increment,
      phonenumber int not null,
      name varchar(255),
      age int,
      city varchar(255),
      gender varchar(255)", /// or bolean
   // setters
   'set_id'    => "insert into user (phonenumber) values ($id)",
   'set_name'  => "insert into user (name) values ($name)",
   'set_age'   => "insert into user (age) values ($age)",
   'set_city'  => "insert into user (city) values ($city)",
   'set_gender' => "insert into user (gender) values ($gender)",
   // getters
   'get_name'  => "select name from user where phonnumber like ($id)",
   'get_age'   => "select age from user where phonnumber like ($id)",
   'get_city'  => "select city from user where phonnumber like ($id)",


   
);

/*
sqlite> CREATE TABLE COMPANY(
   ID INT PRIMARY KEY     NOT NULL,
   NAME           TEXT    NOT NULL,
   AGE            INT     NOT NULL,
   ADDRESS        CHAR(50),
   SALARY         REAL
);
*/
?>