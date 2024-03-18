<?php include("php/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <title>Help and FAQs</title>
</head>
<body>
    <!-- Navbar -->
    <?php include("header.php"); ?>
    <!-- Main section -->
<section class="bg-center bg-cover bg-no-repeat bg-gray-500 bg-blend-multiply" style="background-image: url('images/help.jpg');">
    <div class="px-4 max-w-screen-xl" style="text-align: end;padding-top: 10rem; padding-bottom: 10rem;margin-left: auto;padding-right: 10%;">
        <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Help and support</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl">What can we help you with?</p>
    </div>
</section>

<div class="px-4 max-w-screen-xl mx-auto flex justify-between " style="padding-top: 6rem; padding-bottom: 6rem;">
        <div style="width:40%">
        <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-white" style="color: red;">What can we help you with?</h1>
        </div>
        <div style="width: 60%;">
        <p class="mb-8 text-md" style="color: black;">If you're a residential customer recieving gas and/or electricity from EER Next, or if your account number starts with the letter A (for example A-B12345), you'll need to visit the EER Next website for help and support.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
            <a href="#" class="inline-flex justify-center items-center py-3 px-5 focus:outline-none text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base me-2 mb-2 ">
                Get support with EER Next
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a> 
        </div>
        </div>
    </div>

    <div class="px-4 max-w-screen-xl mx-auto flex justify-between items-center" style="padding-top: 0rem; padding-bottom: 0rem;">
        <div >
        <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-white md:text-5xl" style="color: black;">Help and FAQs</h1>
        </div>
       
    </div>

  

<div class="px-4 max-w-screen-xl mx-auto" style="padding-bottom: 20px;">

    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
      <h2 id="accordion-flush-heading-1">
        <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
          <span>How do I contact EER by phone?</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
      </h2>
      <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
          <p class="mb-2 text-gray-500 dark:text-gray-400">If you're a gas and/or electric customer, you'll need to speak to our team at EER Next. The contact number is 0808 501 0000. For all other enquiries, please visit this contact page to get to the right department. As our service offerings are so vast, we don't have a single switchboard for all of our services as there would be hundreds of options.</p>
        </div>
      </div>

      <!-- Second FAQ -->
      <h2 id="accordion-flush-heading-2">
        <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="true" aria-controls="accordion-flush-body-2">
          <span>How do I contact EER by phone?</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
      </h2>
      <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
          <p class="mb-2 text-gray-500 dark:text-gray-400">If you're a gas and/or electric customer, you'll need to speak to our team at EER Next. The contact number is 0808 501 0000. For all other enquiries, please visit this contact page to get to the right department. As our service offerings are so vast, we don't have a single switchboard for all of our services as there would be hundreds of options.</p>
        </div>
      </div>

       <!-- Third FAQ -->
       <h2 id="accordion-flush-heading-3">
        <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-3" aria-expanded="true" aria-controls="accordion-flush-body-3">
          <span>How do I contact EER by phone?</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
      </h2>
      <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
          <p class="mb-2 text-gray-500 dark:text-gray-400">If you're a gas and/or electric customer, you'll need to speak to our team at EER Next. The contact number is 0808 501 0000. For all other enquiries, please visit this contact page to get to the right department. As our service offerings are so vast, we don't have a single switchboard for all of our services as there would be hundreds of options.</p>
        </div>
      </div>

       <!-- Fourth FAQ -->
       <h2 id="accordion-flush-heading-4">
        <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-4" aria-expanded="true" aria-controls="accordion-flush-body-4">
          <span>How do I contact EER by phone?</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
      </h2>
      <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-2">
        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
          <p class="mb-2 text-gray-500 dark:text-gray-400">If you're a gas and/or electric customer, you'll need to speak to our team at E.ON Next. The contact number is 0808 501 0000. For all other enquiries, please visit this contact page to get to the right department. As our service offerings are so vast, we don't have a single switchboard for all of our services as there would be hundreds of options.</p>
        </div>
      </div>

       <!-- Fifth FAQ -->
       <h2 id="accordion-flush-heading-5">
        <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-5" aria-expanded="true" aria-controls="accordion-flush-body-5">
          <span>How do I contact EER by phone?</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
      </h2>
      <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-2">
        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
          <p class="mb-2 text-gray-500 dark:text-gray-400">If you're a gas and/or electric customer, you'll need to speak to our team at EER Next. The contact number is 0808 501 0000. For all other enquiries, please visit this contact page to get to the right department. As our service offerings are so vast, we don't have a single switchboard for all of our services as there would be hundreds of options.</p>
        </div>
      </div>

    </div>
</div>
    

  <!-- Footer -->
  <?php include("footer.php"); ?>