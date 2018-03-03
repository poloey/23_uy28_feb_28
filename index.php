<?php require 'header.php' ; ?>
<?php 
$con = mysqli_connect('localhost', 'root', '', 'feni');
$teachers = $con->query('select * from teachers');
?>
<div class="container mt-5">
  <table class="table table-bordered">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
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
  </table>
</div>
<?php require 'footer.php' ; ?>
