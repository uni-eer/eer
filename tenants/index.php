<?php include "../php/db.php";
// Auth
if (!isset($_SESSION['role'])) {
  header("location: ../login.php");
}
$user_id = $_SESSION['user_id'];
if(intval($_SESSION['role']) !== 3){
  header("location: ../logout.php");
}

// fetching 
$data = mysqli_query($conn, "SELECT * FROM `building` order by id desc");
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
    </div>

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