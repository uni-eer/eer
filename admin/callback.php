<?php include "../php/db.php";
// Auth
if (!isset($_SESSION['role'])) {
  header("location: ../login.php");
}
$user_id = $_SESSION['user_id'];
if(intval($_SESSION['role']) !== 1){
  header("location: ../logout.php");
}

// fetching 
$data = mysqli_query($conn, "SELECT * FROM `callback` order by id desc");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Callback</title>
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
<div><h2>Manage Callback</h2></div>
    </div>
   <table class="table table-bordered table-striped table-hover" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Contact name</th>
      <th scope="col">Job title</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Company Name</th>
      <th scope="col">Site Postcode</th>
      <th scope="col">HeadOffice Postcode</th>
      <th scope="col">Business Sector</th>
      <th scope="col">Created At</th>
      <th scope="col">Delete</th>
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
      <td><?=$fetch_rows['contact_name']?></td>
      <td><?=$fetch_rows['job_title']?></td>
      <td><?=$fetch_rows['email']?></td>
      <td><?=$fetch_rows['phone']?></td>
      <td><?=$fetch_rows['company_name']?></td>
      <td><?=$fetch_rows['site_postcode']?></td>
      <td><?=$fetch_rows['postcode_office']?></td>
      <td><?=$fetch_rows['business_sector']?></td>
      <td><?=date('d M, Y h:i A', strtotime($fetch_rows['created_at']))?></td>
      <td><a href="delete_callback.php?id=<?=$fetch_rows['id']?>" class="btn btn-danger">Delete</a></td>
    </tr>
<?php
      }
    } ?>

  </tbody>
</table>



  


   <script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        order:false,
    });
} );
   </script>
    <?php include("footer.php"); ?>