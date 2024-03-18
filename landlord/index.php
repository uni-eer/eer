<?php include "../php/db.php";
// Auth
if (!isset($_SESSION['role'])) {
  header("location: ../login.php");
}
$user_id = $_SESSION['user_id'];
if(intval($_SESSION['role']) !== 2){
  header("location: ../logout.php");
}
$showError = false;
$showAlert = false;
// Adding
if (isset($_POST['add_building'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $built_year = mysqli_real_escape_string($conn, $_POST['built_year']);
  $eer = mysqli_real_escape_string($conn, $_POST['eer']);
  $grade = mysqli_real_escape_string($conn, $_POST['grade']);

  $add_building_q = mysqli_query($conn, "INSERT INTO `building`(`user_id`, `name`, `address`, `built_year`, `eer`, `grade`, `created_at`) VALUES ($user_id, '$name', '$address', '$built_year', '$eer', '$grade', current_timestamp())");

  if($add_building_q){
$showAlert = 'Building is added successfully!';
  }else{
$showError = "Building couldn't be added! Server error";
  }
}

// fetching 
$data = mysqli_query($conn, "SELECT * FROM `building` WHERE `user_id`=$user_id order by id desc");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landlord Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include("header.php"); ?>
   <div class="container mx-auto mt-5">
    <div class="d-flex justify-content-between">
<div><h2>Buildings</h2></div>
<div><button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary">Add Building</button></div>
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
   <table class="table table-bordered table-striped table-hover" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Building name</th>
      <th scope="col">address</th>
      <th scope="col">Built Year</th>
      <th scope="col">EER</th>
      <th scope="col">Grade</th>
      <th scope="col">View</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php if(mysqli_num_rows($data)>0){
      $sno = 0;
      while($fetch_rows = mysqli_fetch_assoc($data)){
        $sno++;
?>
    <tr>
      <th scope="row"><?=$sno?></th>
      <td><?=$fetch_rows['name']?></td>
      <td><?=$fetch_rows['address']?></td>
      <td><?=$fetch_rows['built_year']?></td>
      <td><?=$fetch_rows['eer']?></td>
      <td><?=$fetch_rows['grade']?></td>
      <td><a href="view_building.php?id=<?=$fetch_rows['id']?>" class="btn btn-dark">View</a></td>
      <td><a href="edit_building.php?id=<?=$fetch_rows['id']?>" class="btn btn-success">Edit</a></td>
    </tr>
<?php
      }
    } ?>

  </tbody>
</table>
   </div>

   <!-- Add building modal -->
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="post">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Building</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" required>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="address" required>
  </div>
  <div class="mb-3">
    <label for="built_year" class="form-label">Built Year</label>
    <input type="date" name="built_year" class="form-control" id="built_year"  required> 
  </div>
  <div class="mb-3">
    <label for="eer" class="form-label">EER</label>
    <input type="text" name="eer" class="form-control" id="eer"  required> 
  </div>
  <div class="mb-3">
    <label for="grade" class="form-label">Grade</label>
    <input type="text" name="grade" class="form-control" id="grade"  required> 
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add_building" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>


   <script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        order:false,
    });
} );
   </script>
    <?php include("footer.php"); ?>