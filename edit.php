<?php 

$id = $_GET['id'];
$con = mysqli_connect('localhost', 'root', '', 'feni');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $statement = $con->query("update teachers set name='$name', email='$email' where id=$id");
}
$statement = $con->query("select * from teachers where id=$id");
$teacher = $statement->fetch_object();
 ?>
<?php require 'header.php'; ?>

<div class="container mt-5">
  <form action="" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input value="<?php echo $teacher->name ?>" type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input value="<?php echo $teacher->email ?>" type="text" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-outline-primary">update a teacher</button>
    </div>
    
    
    
  </form>
</div>

<?php require 'footer.php'; ?>