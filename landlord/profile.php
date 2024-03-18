<?php 
include "../php/db.php";

// Authentication check
if (!isset($_SESSION['role'])) {
    header("location: ../login.php");
  }
  if(intval($_SESSION['role']) !== 2){
    header("location: ../logout.php");
  }
$user_id = $_SESSION['user_id'];
$showError = false;
$showAlert = false;

// Updating Profile
if (isset($_POST['update_profile'])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Phone number validation
    if (!is_numeric($phone)) {
        $showError = 'Phone number should be numeric!';
    } else {
        // Validate Email - if already exists
        $email_query = "SELECT * FROM `users` WHERE `email` = '$email' AND `id` != $user_id";
        $email_result = mysqli_query($conn, $email_query);
        if (mysqli_num_rows($email_result) > 0) {
            $showError = 'Email already exists!';
        } else {
            // Update Email
            mysqli_query($conn, "UPDATE `users` SET `email` = '$email' WHERE `id` = $user_id");

            // Validate Username - if already exists
            $username_query = "SELECT * FROM `users` WHERE `username` = '$username' AND `id` != $user_id";
            $username_result = mysqli_query($conn, $username_query);
            if (mysqli_num_rows($username_result) > 0) {
                $showError = 'Username already exists!';
            } else {
                // Update Username
                mysqli_query($conn, "UPDATE `users` SET `username` = '$username' WHERE `id` = $user_id");
            }
            
            // Update name and phone
            mysqli_query($conn, "UPDATE `users` SET `fname` = '$fname', `lname` = '$lname', `phone` = '$phone' WHERE `id` = $user_id");

            // Update Password if provided
            if (!empty($password)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                mysqli_query($conn, "UPDATE `users` SET `password` = '$hash' WHERE `id` = $user_id");
            }
            
            $showAlert = "Profile updated successfully!";
        }
    }
}

$logged_data = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`=$user_id");
$data = mysqli_fetch_assoc($logged_data);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
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
<div><h2>Profile</h2></div>
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
    <input type="text" name="fname" class="form-control" id="fname" value="<?=$data['fname']?>" required>
  </div>
  <div class="mb-3">
    <label for="lname" class="form-label">Last name</label>
    <input type="text" name="lname" class="form-control" id="lname" value="<?=$data['lname']?>" required>
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">User name</label>
    <input type="text" name="username" class="form-control" id="username" value="<?=$data['username']?>" required>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" name="phone" class="form-control" id="phone" value="<?=$data['phone']?>" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="email" value="<?=$data['email']?>" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  <button type="submit" name="update_profile" class="btn btn-primary">Update</button>
</form>
   </div>

   <?php include("footer.php"); ?>