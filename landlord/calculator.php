<?php 
include "../php/db.php";

// Authentication check
if (!isset($_SESSION['role'])) {
    header("location: ../login.php");
  }
  if(intval($_SESSION['role']) !== 2){
    header("location: ../logout.php");
  }
  if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
  }else{
    $user_id = $_SESSION['user_id'];
  }
  if(isset($_GET['building_id'])){
    $building_id = $_GET['building_id'];
  }else{
    $building_id = NULL;
  }
$showError = false;
$showAlert = false;

// Updating Profile
if (isset($_POST['calculate'])) {
    $lc = mysqli_real_escape_string($conn, $_POST["lc"]);
    $hc = mysqli_real_escape_string($conn, $_POST["hc"]);
    $hwc = mysqli_real_escape_string($conn, $_POST["hwc"]);
    $tfa = mysqli_real_escape_string($conn, $_POST["tfa"]);
    if (!is_numeric($lc)) {
        $showError = 'Lighting Cost must be numeric!';
    }else if(!is_numeric($hc)){
      $showError = 'Heating Cost must be numeric!';
    }else if(!is_numeric($hwc)){
      $showError = 'Hot Water Cost must be numeric!';
    }else if(!is_numeric($tfa)){
      $showError = 'Total Floor Area must be numeric!';
    }{
      $ECD = 0.42;
      $TEC = $lc + $hc + $hwc;
      $TEC_per_TFA = $TEC / $tfa;
  
      if ($TEC_per_TFA < 3.5) {
          $EER = 100 - 13.95 * $TEC_per_TFA;
      } else {
          $EER = 117 - 121 * log10($TEC_per_TFA);
      }  

      $rating_band = "";
if ($EER >= 92) {
    $rating_band = "A";
} elseif ($EER >= 81) {
    $rating_band = "B";
} elseif ($EER >= 69) {
    $rating_band = "C";
} elseif ($EER >= 55) {
    $rating_band = "D";
} elseif ($EER >= 39) {
    $rating_band = "E";
} elseif ($EER >= 21) {
    $rating_band = "F";
} else {
    $rating_band = "G";
}
$EER = round($EER,2);
$showAlert = "EER = ". $EER . " and Rating Band is ". $rating_band;
if($building_id !== NULL){
  $save_data = mysqli_query($conn, "INSERT INTO `calculations`(`user_id`,`building_id`, `lc`, `hc`, `hwc`, `tfa`,`rating_band`,`eer`, `created_at`) VALUES ($user_id,$building_id, '$lc', '$hc','$hwc', '$tfa', '$rating_band','$EER', current_timestamp())");
}else{
  $save_data = mysqli_query($conn, "INSERT INTO `calculations`(`user_id`, `lc`, `hc`, `hwc`, `tfa`,`rating_band`,`eer`, `created_at`) VALUES ($user_id,'$lc', '$hc','$hwc', '$tfa', '$rating_band','$EER', current_timestamp())");
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
    <label for="lc" class="form-label">Lighting Cost</label>
    <input type="text" name="lc" class="form-control" id="lc"  required>
  </div>
  <div class="mb-3">
    <label for="hc" class="form-label">Heating Cost</label>
    <input type="text" name="hc" class="form-control" id="hc" required>
  </div>
  <div class="mb-3">
    <label for="hwc" class="form-label">Hot Water Cost</label>
    <input type="text" name="hwc" class="form-control" id="hwc" required>
  </div>
  <div class="mb-3">
    <label for="tfa" class="form-label">Total Floor Area</label>
    <input type="text" name="tfa" class="form-control" id="tfa" required>
  </div>
  <div class="w-full d-flex justify-content-end">
  <button type="submit" name="calculate" class="btn btn-primary">Calculate</button>
  </div>
</form>
   </div>

   <?php include("footer.php"); ?>