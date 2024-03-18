<?php 
include "../php/db.php";

// Authentication check
if (!isset($_SESSION['role'])) {
    header("location: ../login.php");
  }
  if(intval($_SESSION['role']) !== 1){
    header("location: ../logout.php");
  }
  if(!isset($_GET['id'])){
    if(isset($_SERVER['HTTP_REFERER'])) { // Get prevoius location
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
exit();
  }
  $id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$showError = false;
$showAlert = false;

// Updating Profile
if (isset($_POST['update_building'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $built_year = mysqli_real_escape_string($conn, $_POST['built_year']);
        $eer = mysqli_real_escape_string($conn, $_POST['eer']);
        $grade = mysqli_real_escape_string($conn, $_POST['grade']);
        $r_id = $_POST['id'];
        $update = mysqli_query($conn, "UPDATE `building` SET `name`='$name',`address`='$address',`built_year`='$built_year',`eer`='$eer',`grade`='$grade' WHERE `id`=$r_id");

        if($update){
            $showAlert = 'Building is updated successfully!';
              }else{
            $showError = "Building couldn't be updated!";
              }
}

$calculations_data = mysqli_query($conn, "SELECT * FROM `building` WHERE `id`=$id");
if(mysqli_num_rows($calculations_data)===0){
    if(isset($_SERVER['HTTP_REFERER'])) { // Get prevoius location
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
exit();
}
$data = mysqli_fetch_assoc($calculations_data);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Building</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include("header.php"); ?>
   <div style="max-width: 500px" class=" mx-auto mt-5">
    <div class="d-flex justify-content-between">
<div><h2>Update Building</h2></div>
    </div>
    <?php if($showAlert){ ?>
      <div class="alert alert-success" role="alert">
  <?=$showAlert?>
</div>
    <?php } ?> 
    <?php if($showError){ ?>
      <div class="alert alert-danger" role="alert">
      <?=$showError?>
</div>
    <?php } ?>
    <form method="post">
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="<?=$data['name']?>" required>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="address" value="<?=$data['address']?>" required>
  </div>
  <input type="hidden" name="id" value="<?=$data['id']?>">
  <div class="mb-3">
    <label for="built_year" class="form-label">Built Year</label>
    <input type="date" name="built_year" class="form-control" id="built_year"  value="<?=$data['built_year']?>" required> 
  </div>
  <div class="mb-3">
    <label for="eer" class="form-label">EER</label>
    <input type="text" name="eer" class="form-control" id="eer"  value="<?=$data['eer']?>" required> 
  </div>
  <div class="mb-3">
    <label for="grade" class="form-label">Grade</label>
    <input type="text" name="grade" class="form-control" id="grade"  value="<?=$data['grade']?>" required> 
  </div>
  <div class="w-full d-flex justify-content-end">
  <button type="submit" name="update_building" class="btn btn-primary">Update Building</button>
  </div>
</form>
   </div>

   <?php include("footer.php"); ?>