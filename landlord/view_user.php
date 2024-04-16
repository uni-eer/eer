<?php 
include "../php/db.php";

// Authentication check
if (!isset($_SESSION['role'])) {
    header("location: ../login.php");
  }
  if(intval($_SESSION['role']) !== 2){
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



$user_data = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`=$id");
if(mysqli_num_rows($user_data)===0){
    if(isset($_SERVER['HTTP_REFERER'])) { // Get prevoius location
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
exit();
}
$data = mysqli_fetch_assoc($user_data);
$role_get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `roles` WHERE `id`=$data[role_id]"));
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View User</title>
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
<div><h2>View User</h2></div>
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
    <label for="fname" class="form-label">First name</label>
    <input type="text" name="fname" class="form-control" id="fname" value="<?=$data['fname']?>" readonly disabled>
  </div>
  <div class="mb-3">
    <label for="lname" class="form-label">Last name</label>
    <input type="text" name="lname" class="form-control" id="lname" value="<?=$data['lname']?>" readonly disabled>
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">User name</label>
    <input type="text" name="username" class="form-control" id="username" value="<?=$data['username']?>" readonly disabled>
  </div>
  <input type="hidden" name="id" value="<?=$data['id']?>">
  <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" name="phone" class="form-control" id="phone" value="<?=$data['phone']?>" readonly disabled>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="address" value="<?=$data['UserAddress']?>" readonly disabled>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="email" value="<?=$data['email']?>" readonly disabled>
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <input type="text" name="role" class="form-control" id="role" value="<?=$role_get['name']?>" readonly disabled>
  </div>
  <div class="mb-3">
    <label for="registered_at" class="form-label">Registered At</label>
    <input type="text" name="registered_at" class="form-control" id="registered_at" value="<?=date('d M, Y h:i A', strtotime($data['created_at']))?>" readonly disabled>
  </div>
</form>
   </div>

   <?php include("footer.php"); ?>