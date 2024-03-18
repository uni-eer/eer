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
    <title>View Building</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include("header.php"); ?>
   <div style="max-width: 700px" class=" mx-auto mt-5">
    <div class="d-flex justify-content-between">
<div><h2>Building Details</h2></div>
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
    
  <table class="table table-bordered mx-auto" style="max-width:700px;">
  <thead>
  <tr>
      <th scope="col" colspan="2" style="width:100%;background: #3131a0;color:white;">Energy Efficiency Rating</th>
    </tr>
    <tr>
      <th scope="col"></th>
      <th scope="col">Current</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row" class="d-flex justify-content-between align-items-center" style="width:40%;background: green;color:white;">
    <div>(92 - 100%)</div>
    <div>A</div>
    </th>
      <td><?php if(intval($data['eer']) >= 92 && intval($data['eer']) <= 100){ echo $data['eer']; } ?></td>
    </tr>
    <tr>
      <th scope="row" class="d-flex justify-content-between align-items-center" style="width:50%;background: #1eba1e;color:white;">
    <div>(81 - 91%)</div>
    <div>B</div>
    </th>
      <td><?php if(intval($data['eer']) >= 81 && intval($data['eer']) <= 91){ echo $data['eer']; } ?></td>
    </tr>
    <tr>
      <th scope="row" class="d-flex justify-content-between align-items-center" style="width:60%;background: #18e446;color:white;">
    <div>(69 - 80%)</div>
    <div>C</div>
    </th>
      <td><?php if(intval($data['eer']) >= 69 && intval($data['eer']) <= 80){ echo $data['eer']; } ?></td>
    </tr>
    <tr>
      <th scope="row" class="d-flex justify-content-between align-items-center" style="width:70%;background: #e2e210;color:white;">
    <div>(55 - 68%)</div>
    <div>D</div>
    </th>
    <td><?php if(intval($data['eer']) >= 55 && intval($data['eer']) <= 68){ echo $data['eer']; } ?></td>
    </tr>
    
    <tr>
      <th scope="row" class="d-flex justify-content-between align-items-center" style="width:80%;background: #f7ac61;color:white;">
    <div>(39 - 54%)</div>
    <div>E</div>
    </th>
      <td><?php if(intval($data['eer']) >= 39 && intval($data['eer']) <= 54){ echo $data['eer']; } ?></td>
    </tr><tr>
      <th scope="row" class="d-flex justify-content-between align-items-center" style="width:90%;background: #f78524;color:white;">
    <div>(21 - 38%)</div>
    <div>F</div>
    </th>
    <td><?php if(intval($data['eer']) >= 21 && intval($data['eer']) <= 38){ echo $data['eer']; } ?></td>
    </tr>

    <tr>
      <th scope="row" class="d-flex justify-content-between align-items-center" style="width:100%; background:red; color:white;">
    <div>(1 - 20%)</div>
    <div>G</div>
    </th>
      <td><?php if(intval($data['eer']) >= 1 && intval($data['eer']) <= 20){ echo $data['eer']; } ?></td>
    </tr>
   
  </tbody>
  </table> 
    <form method="post">
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="<?=$data['name']?>" readonly disabled>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="address" value="<?=$data['address']?>" readonly disabled>
  </div>
  <div class="mb-3">
    <label for="built_year" class="form-label">Built Year</label>
    <input type="date" name="built_year" class="form-control" id="built_year"  value="<?=$data['built_year']?>" readonly disabled> 
  </div>
  <div class="mb-3">
    <label for="eer" class="form-label">EER</label>
    <input type="text" name="eer" class="form-control" id="eer"  value="<?=$data['eer']?>" readonly disabled> 
  </div>
  <div class="mb-3">
    <label for="grade" class="form-label">Grade</label>
    <input type="text" name="grade" class="form-control" id="grade"  value="<?=$data['grade']?>" readonly disabled> 
  </div>

</form>
   </div>

   <?php include("footer.php"); ?>