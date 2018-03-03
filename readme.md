# crud using pdo 

## connection with pdo 

~~~php
$con = mysqli_connect('localhost', 'root', '', 'feni');
~~~

## create teacher table 
~~~php
$con->query('drop table if exists teachers');
$con->query('
  create table teachers(
    id serial,
    name varchar(30),
    email varchar(30)
  )
 ');
~~~

## seeding with dummy data 

~~~php
$statement = $con->query("insert into teachers(name, email) values('sarwar', 'sarwar@gmail.com')");
~~~

## reading from database 

~~~php
$con = mysqli_connect('localhost', 'root', '', 'feni');
$teachers = $con->query('select * from teachers');
~~~

~~~html
<?php while($teacher = $teachers->fetch_object()): ?>
  <tr>
    <td><?php echo $teacher->name ?></td>
    <td><?php echo $teacher->email ?></td>
    <td>
      <a href="edit.php?id=<?php echo $teacher->id ?>" class="btn btn-info">Edit</a>
      <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?php echo $teacher->id ?>" class="btn btn-danger">Delete</a>
    </td>
  </tr>
<?php endwhile; ?>
~~~

## add a teacher 

~~~php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $con = mysqli_connect('localhost', 'root', '', 'feni');
  $statement = $con->query("insert into teachers(name, email) values('$name', '$email')");
}
~~~

## edit teacher  or read single row     

~~~php
$id = $_GET['id'];
$con = mysqli_connect('localhost', 'root', '', 'feni');
$statement = $con->query("select * from teachers where id=$id");
$teacher = $statement->fetch_object();
~~~

## update teacher 
~~~php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $statement = $con->query("update teachers set name='$name', email='$email' where id=$id");
}
~~~

## delete teacher 

~~~php
$id = $_GET['id'];
$con = mysqli_connect('localhost', 'root', '', 'feni');
$statement = $con->query("delete from teachers where id=$id");
header('Location: /');
~~~


