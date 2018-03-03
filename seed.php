<?php 

$con = mysqli_connect('localhost', 'root', '', 'feni');
$statement = $con->query("insert into teachers(name, email) values('sarwar', 'sarwar@gmail.com')");
