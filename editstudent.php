<?php
$conn = mysqli_connect('localhost', 'root', '', 'crud') or exit('Connection Failed');

$id = $_GET['id'];
$sql = "SELECT * FROM student WHERE id = {$id}";
$result = mysqli_query($conn, $sql) or exit('Query Unsuccessful.');
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $sql = "UPDATE student SET name='{$name}', roll_no='{$roll_no}' WHERE id={$id}";
    $result = mysqli_query($conn, $sql) or exit('Query Unsuccessful.');
    header("Location: index.php");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<div class="mynavbar">
  <h1>CRUD</h1>
</div>
<div class="title">
  <h1> Edit Student Data</h1>
</div>
<div class="featchdata">
  <form action="" method="post">
    <div class="mb-3" style="margin-left: 10px;">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder=""
           style=" width: 300px;" value="<?php echo $row['id']; ?>" readonly>
    </div>
    <div class="mb-3" style="margin-left: 10px;">
      <label for="name" class="form-label">Name</label>
      <input type="text"
             class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" style=" width: 300px;" value="<?php echo $row['name']; ?>">
    </div>
    <div class="mb-3" style="margin-left: 10px;">
      <label for="roll_no" class="form-label">Roll No</label>
      <input type="text"
             class="form-control" name="roll_no" id="roll_no" aria-describedby="helpId" placeholder="" style=" width: 300px;" value="<?php echo $row['roll_no']; ?>">
    </div>
    <div class="mb-3" style="margin-left: 10px;">
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
      <a name="" id="" class="btn btn-secondary" href="index.php" role="button">Back</a>
    </div>
  </form>
</div>
</body>
</html>