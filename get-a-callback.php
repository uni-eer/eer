<?php include("php/db.php"); 
$showError = false;
$showAlert = false;
// Adding
if (isset($_POST['submit_btn'])) {
  $contact_name = mysqli_real_escape_string($conn, $_POST['contact_name']);
  $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
  $site_postcode = mysqli_real_escape_string($conn, $_POST['site_postcode']);
  $postcode_office = mysqli_real_escape_string($conn, $_POST['postcode_office']);
  $business_sector = mysqli_real_escape_string($conn, $_POST['business_sector']);

  $add_callback = mysqli_query($conn, "INSERT INTO `callback`(`contact_name`, `job_title`, `phone`, `email`, `company_name`, `site_postcode`,`postcode_office`, `business_sector`, `created_at`) VALUES ('$contact_name', '$job_title', '$phone', '$email', '$company_name', '$site_postcode', '$postcode_office', '$business_sector', current_timestamp())");

  if($add_callback){
$showAlert = 'Callback is added successfully!';
  }else{
$showError = "Callback couldn't be added! Server error";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <title>Get a callback</title>
</head>
<body>
    <!-- Navbar -->
    <?php include("header.php"); ?>

<div class="px-4 max-w-screen-xl mx-auto flex justify-between " style="padding-top: 6rem; padding-bottom: 6rem;">
        <div>
        <h1 class="mb-8 text-4xl font-bold tracking-tight leading-none text-white" style="color: red;">Interested in Energy management tools?</h1>
        <p class="">Simply fill in the form and we'll be in touch as soon as we can.</p>

        <form class="space-y-6 mt-10" method="POST">
      

<?php if($showAlert){ ?>
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <?=$showAlert?>
</div>
    <?php } ?> 
    <?php if($showError){ ?>
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <?=$showError?>
</div>
    <?php } ?>

<p class="font-bold">About you</p>
        <div class="mt-0">
          <input id="contact_name" name="contact_name" type="text" placeholder="Contact Name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="mt-2">
          <input id="job_title" name="job_title" type="text" placeholder="Job title" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="mt-2">
          <input id="email" name="email" type="email" placeholder="Email address" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="mt-2">
          <input id="phone" name="phone" type="text" placeholder="Contact Phone number" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        <p class="font-bold" style="margin-top:50px !important;">About your business</p>
        <div class="mt-0">
          <input id="company_name" name="company_name" type="text" placeholder="Company Name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="mt-2">
          <input id="site_postcode" name="site_postcode" type="text" placeholder="Site postcode" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="mt-2">
          <input id="postcode_office" name="postcode_office" type="text" placeholder="Postcode of head office" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="">
          <div class="mt-2">
            <select id="business_sector" name="business_sector" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option value="Business Sector">Business Sector</option>
              <option value="Health care">Health care</option>
              <option value="Hospitality & Leisure">Hospitality & Leisure</option>
              <option value="Housing developers">Housing developers</option>
              <option value="Manufacturing">Manufacturing</option>
            </select>
          </div>
        </div>

        <button type="submit" name="submit_btn" class="inline-flex justify-center items-center py-3 px-5 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Get a callback
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button> 


        </form>
        </div>
    </div>

  

    

  <!-- Footer -->
  <?php include("footer.php"); ?>