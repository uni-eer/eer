<?php include "../php/db.php";
// Auth
if (!isset($_SESSION['role'])) {
  header("location: ../login.php");
}
$user_id = $_SESSION['user_id'];
if(intval($_SESSION['role']) !== 1){
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
$data = mysqli_query($conn, "SELECT * FROM `users` order by id desc");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Users</title>
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
<div><h2>Manage Users</h2></div>
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
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Role</th>
      <th scope="col">Regsitered At</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if(mysqli_num_rows($data)>0){
      $sno = 0;
      while($fetch_rows = mysqli_fetch_assoc($data)){
        $sno++;
        $role_get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `roles` WHERE `id`=$fetch_rows[role_id]"));
?>
    <tr>
      <th scope="row"><?=$sno?></th>
      <td><?=$fetch_rows['fname']?></td>
      <td><?=$fetch_rows['lname']?></td>
      <td><?=$fetch_rows['username']?></td>
      <td><?=$fetch_rows['email']?></td>
      <td><?=$fetch_rows['phone']?></td>
      <td><?=$role_get['name']?></td>
      <td><?=date('d M, Y h:i A', strtotime($fetch_rows['created_at']))?></td>
      <td><a href="edit_user.php?id=<?=$fetch_rows['id']?>" class="btn btn-success">Edit</a></td>
      <td><a href="delete_user.php?id=<?=$fetch_rows['id']?>" class="btn btn-danger">Delete</a></td>
    </tr>
<?php
      }
    } ?>

  </tbody>
</table>
   </div>




   <script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        order:false,
    });
} );
   </script>
    <?php include("footer.php"); ?>