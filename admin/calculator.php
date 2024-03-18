<?php 
include "../php/db.php";

// Authentication check
if (!isset($_SESSION['role'])) {
    header("location: ../login.php");
  }
  if(intval($_SESSION['role']) !== 1){
    header("location: ../logout.php");
  }
$user_id = $_SESSION['user_id'];
$showError = false;
$showAlert = false;

// Updating Profile
if (isset($_POST['calculate'])) {
    $ueo = mysqli_real_escape_string($conn, $_POST["ueo"]);
    $tei = mysqli_real_escape_string($conn, $_POST["tei"]);
    if (!is_numeric($ueo)) {
        $showError = 'Useful Energy Output must be numeric!';
    }else{
        if (!is_numeric($tei)) {
            $showError = 'Total Energy Input must be numeric!';
        }else{
            if(floatval($ueo) > floatval($tei)){
            $showError = 'Total Energy Input must be greater than Useful Energy Output!';
            }else{
                if(intval($tei) === 0){
                    $showAlert = 'EER = 0%';
                    $eer = 0;
                }else{
                    // Formula
                    $result = (floatval($ueo) / floatval($tei)) * 100;
                    $showAlert = 'EER = '.' '. round($result, 2) .'%';
                    $eer = round($result, 2);
                }
                $save_data = mysqli_query($conn, "INSERT INTO `calculations`(`user_id`, `ueo`, `tei`, `eer`, `created_at`) VALUES ($user_id, '$ueo', '$tei', '$eer', current_timestamp())");
            }
        }
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculator</title>
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
<div><h2>Calculator</h2></div>
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
    <label for="ueo" class="form-label">Useful Energy Output</label>
    <input type="text" name="ueo" class="form-control" id="ueo"  required>
  </div>
  <div class="mb-3">
    <label for="tei" class="form-label">Total Energy Input</label>
    <input type="text" name="tei" class="form-control" id="tei" required>
  </div>
  <div class="w-full d-flex justify-content-end">
  <button type="submit" name="calculate" class="btn btn-primary">Calculate</button>
  </div>
</form>
   </div>

   <?php include("footer.php"); ?>