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
    <h1>Add Student</h1>
  </div>
  <div class="form">
    <form action="" method="post" onsubmit="return validateForm()">
      <div class="mb-3" style="margin-left: 10px;">
        <label for="" class="form-label">Name</label>
        <input type="text"
          class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" style=" width: 300px;">
        <span id="nameError" style="color: red;"></span>
      </div>
      <div class="mb-3" style="margin-left: 10px;">
        <label for="" class="form-label">Roll No</label>
        <input type="text"
          class="form-control" name="rollno" id="rollno" aria-describedby="helpId" placeholder="" style=" width: 300px;">
        <span id="rollnoError" style="color: red;"></span>
      </div>
      <div class="mb-3" style="margin-left: 10px;">
       <button type="submit" name="submit" class="btn btn-primary">Add</button> 
       <a name="" id="" class="btn btn-secondary" href="index.php" role="button">Back</a>
      </div>
      
    </form>
  </div>
    
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'crud') or exit('Connection Failed');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $sql = "INSERT INTO student(name,roll_no) VALUES('{$name}','{$rollno}')";
    $result = mysqli_query($conn, $sql) or exit('Query Unsuccessful.');
    mysqli_close($conn);
    header('Location: index.php'); // redirect to index page
}

?>
<script>
function validateForm() {
  var name = document.getElementById("name").value;
  var rollno = document.getElementById("rollno").value;
  var nameError = document.getElementById("nameError");
  var rollnoError = document.getElementById("rollnoError");
  var isValid = true;
  
  if (name == "") {
    nameError.innerHTML = "Name is required";
    isValid = false;
  } else {
    nameError.innerHTML = "";
  }
  
  if (rollno == "") {
    rollnoError.innerHTML = "Roll No is required";
    isValid = false;
  } else {
    rollnoError.innerHTML = "";
  }
  
  return isValid;
}
</script>
</body>
</html>