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

$sql = array( // use phonenumber as unique id
   'install' => "create table user if not excist(
      id int primary key auto increment,
      phonenumber int not null,
      name varchar(255),
      age int,
      city varchar(255),
      gender varchar(255)", /// or bolean
   'set_name' => "insert into user (name) values ($name)",

   
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