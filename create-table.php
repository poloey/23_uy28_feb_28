<?php

$con = mysqli_connect('localhost', 'root', '', 'feni');
$con->query('drop table if exists teachers');
$con->query('
  create table teachers(
    id serial,
    name varchar(30),
    email varchar(30)
  )
 ');
