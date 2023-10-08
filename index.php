<?php
$conn = mysqli_connect('localhost', 'root', '', 'crud') or exit('Connection Failed');

// Check if the delete button has been clicked and the student ID parameter is set
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM student WHERE id = {$delete_id}";
    $result = mysqli_query($conn, $sql) or exit('Query Unsuccessful.');
    header('Location: index.php');
}

$sql = 'SELECT * FROM student';
$result = mysqli_query($conn, $sql) or exit('Query Unsuccessful.');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
  <div class="mynavbar">
    <h1>CRUD</h1>
  </div>
  <div class="title">
    <h1>Student List</h1>
  </div>
 
  <div class="searchbox">
    <form action="" method="post">
      <div class="mb-3 " style="margin-left: 20px;">
        
        <input type="text"class="form-control" name="" id="" aria-describedby="helpId" placeholder="" style=" width: 300px;" >
        <button type="submit" name="submit" class="btn btn-dark" style="margin-left: 310px; margin-top: -68px;">Search</button> 
      </div>
    </form>
  </div>

  <div class="add" style="margin-left: 10px;">
    <a name="" id="" class="btn btn-primary" href="addstudent.php" role="button">Add Student</a>
  </div>
  <div class="data">
    <div class="table-responsive">

    <?php
  if (mysqli_num_rows($result) > 0) {
      ?>
      <table class="table table-primary">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Rollno</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $count = 1;
      while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr class="">
            <td><?php echo $count; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['roll_no']; ?></td>
            <td>
              <a name="edit" id="" class="btn btn-primary" href="editstudent.php?id=<?php echo $row['id']; ?>" role="button">Edit</a> | 
              <a name="" id="" class="btn btn-danger" href="index.php?delete_id=<?php echo $row['id']; ?>" role="button">Delete</a>
            </td>
          </tr>
          <?php ++$count;
      } ?>
      
        </tbody>
      </table>
      <?php
  } else {
      echo '<h2>No Record Found.</h2>';
  }
      mysqli_close($conn);
?>
    </div>
  </div>
</body>
</html>