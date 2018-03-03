<?php 

$id = $_GET['id'];
$con = mysqli_connect('localhost', 'root', '', 'feni');
$statement = $con->query("delete from teachers where id=$id");
header('Location: /');