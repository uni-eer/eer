<?php
include "php/db.php";
// Auth part
if (isset($_SESSION['auth'])) {
  header("location: $_SESSION[role_url]");
}
$showAlert = false;
$showError = false;
// Check if the form is submitted
if (isset($_POST['signup_btn'])) {
    // Retrieve and sanitize form data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $role_id = mysqli_real_escape_string($conn, $_POST['role_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Encrypt the password
    $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $checkUser = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $checkUser);
    if (mysqli_num_rows($result) > 0) {
        $existingUser = mysqli_fetch_assoc($result);
        if ($existingUser['username'] === $username) {
            $showError = 'Username already exists. Please choose a different one.';
        } elseif ($existingUser['email'] === $email) {
          $showError = 'Email already exists. Please use a different email.';
        }
    } else {
        // If no existing user found, insert the new user
        $role_validation = mysqli_query($conn, "SELECT * FROM `roles` WHERE `id`=$role_id");
        if(mysqli_num_rows($role_validation)===0){
          $showError = 'Role id does not exist anymore!';
        }else{
          $role_data =  mysqli_fetch_assoc($role_validation);
          $sql = "INSERT INTO users (fname, lname, username, role_id, email, password, created_at) VALUES ('$fname', '$lname', '$username', '$role_id', '$email', '$passwordEncrypted', current_timestamp())";
  
          if (mysqli_query($conn, $sql)) {
            $user_data = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email'");
              $fetch_user = mysqli_fetch_assoc($user_data);
              $user_id = $fetch_user['id'];
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['auth'] = true;
            $_SESSION['role'] = $role_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role_url'] = $role_data['url'];
            $showAlert = 'Registration successful! You can now login.';
            header("location: $role_data[url]");
          } else {
            $showError = mysqli_error($conn);
          }
        }
    }

    // Close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <title>Create account</title>
</head>
<body style="background-image: url('images/colorful-bg.png');">

<div class="flex min-h-screen flex-col justify-center items-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <a href="index.php"><img class="mx-auto h-12 w-auto" src="images/logo.png" alt="EER logo"></a>
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create a New Account</h2>
    </div>
  
    <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-md bg-white px-7 py-6 rounded-md shadow-sm">
      <form class="space-y-6" method="POST">


        <?php if($showError){
          ?>
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
  <span class="font-medium"><?=$showError?></span>
</div>
          <?php
        } ?>

<?php if($showAlert){
          ?>
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium"><?=$showAlert?></span>
</div>
          <?php
        } ?>
      <div>
          <label for="fname" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
          <div class="mt-2">
            <input id="fname" name="fname" type="text"  required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div>
          <label for="lname" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
          <div class="mt-2">
            <input id="lname" name="lname" type="text"  required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div>
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="username" name="username" type="text"  required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        
<div>
  <label for="role_id" class="block text-sm font-medium leading-6 text-gray-900">Choose Role</label>
 <div class="mt-2">
 <select id="role_id" name="role_id" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
    <option value="1">Admin</option>
    <option value="2">Landlord</option>
    <option value="3">Tenants</option>
  </select>
 </div>
</div>


        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
  
        <div>
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="mt-2">
            <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
  
        <div>
          <button type="submit" name="signup_btn" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign Up</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm text-gray-500">
        Already have an account?
        <a href="login.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">login</a>
      </p>
    </div>
  </div>
  
    <script src="js/flowbite.min.js"></script>
</body>
</html>