<?php include("php/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
    <!-- Navbar -->
    <?php include("header.php"); ?>

  
<!-- Main section -->
<section class="bg-center bg-cover bg-no-repeat bg-gray-500 bg-blend-multiply" style="background-image: url('images/bg.jpg');">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Building and energy management</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Integrating energy management across your sites will make your buildings smarter, more sustainable and energy efficient. Providing greater comfort for your customers and employees.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="get-a-callback.php" class="inline-flex justify-center items-center py-3 px-5 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Get a callback
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a> 
        </div>
    </div>
</section>
<!-- second mini section -->
<section>
    <div class="px-4 mx-auto max-w-screen-xl text-start py-24">
        <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-black md:text-5xl">Optimisations that drive efficiency</h1>
        <p class="mb-4 text-lg font-normal text-gray-700 lg:text-xl ">Energy management is the key to energy efficiency and reducing energy costs. Understanding how much energy you use and what you're using the most energy on will help you identify and drive efficiencies.</p>
        <p class="mb-8 text-lg font-normal text-gray-700 lg:text-xl ">Our industry leading energy management software - Optimum can help you manage your buildings’ energy consuming assets such as lighting and heating, ventilation and  air conditioning (HVAC) systems. Plus, it provides enhanced data, analysis and control that will supercharge your buildings efficiency. All of this will drive you towards achieving your net zero ambitions reducing consumption and boosting your bottom line.</p>

    </div>
</section>
<!-- Thrid cards section -->
<section class="bg-gray-200">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="max-w-screen-lg mb-8 lg:mb-10">
            <h2 class="mb-0 text-4xl tracking-tight font-extrabold text-black">How our energy management services can help you...</h2>
        </div>
        <div class=" md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
            <div class="text-center">
                <div class="flex justify-center items-center mb-4  rounded-full ">
                    <svg class="w-28 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                      </svg>
                </div>
                <h3 class="mb-2 text-2xl font-bold ">Visualise</h3>
                <p class="text-gray-800">Connect to your existing assets, using our manufacturer-agnostic, open protocol energy management toolkit that allows you to securely collect, store, monitor and analyse your data like never before.</p>
            </div>
            <div class="text-center">
                <div class="flex justify-center items-center mb-4  rounded-full ">
                    <svg class="w-28 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 4v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2m6-16v2m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v10m6-16v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2"/>
                      </svg>
                </div>
                <h3 class="mb-2 text-2xl font-bold ">Legal</h3>
                <p class="text-gray-800">Our suite of digital products can unlock the full potential of your assets and sites, managing them in line with your needs to realise significant energy and carbon savings whilst optimising your internal environment.</p>
            </div>
            <div class="text-center">
                <div class="flex justify-center items-center mb-4  rounded-full ">
                    <svg class="w-28 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 12 2 2 5-5m4.5 5.3 1-.9a2 2 0 0 0 0-2.8l-1-.9a2 2 0 0 1-.6-1.4V7a2 2 0 0 0-2-2h-1.2a2 2 0 0 1-1.4-.5l-.9-1a2 2 0 0 0-2.8 0l-.9 1a2 2 0 0 1-1.4.6H7a2 2 0 0 0-2 2v1.2c0 .5-.2 1-.5 1.4l-1 .9a2 2 0 0 0 0 2.8l1 .9c.3.4.6.9.6 1.4V17a2 2 0 0 0 2 2h1.2c.5 0 1 .2 1.4.5l.9 1a2 2 0 0 0 2.8 0l.9-1a2 2 0 0 1 1.4-.6H17a2 2 0 0 0 2-2v-1.2c0-.5.2-1 .5-1.4Z"/>
                      </svg>
                </div>
                <h3 class="mb-2 text-2xl font-bold ">Optimise</h3>
                <p class="text-gray-800">We'll work with you to ensure energy efficiency projects reduce cost, lower energy consumption and increase staff engagement, enhancing your business case for net-zero.</p>
            </div>
        </div>
    </div>
  </section>

    <!-- Scores -->
    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
          <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
          <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Work with us</h2>
            <p class="mt-6 text-lg leading-8 text-gray-300">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
          </div>
          <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
              <a href="#">Open roles <span aria-hidden="true">&rarr;</span></a>
              <a href="#">Internship program <span aria-hidden="true">&rarr;</span></a>
              <a href="#">Our values <span aria-hidden="true">&rarr;</span></a>
              <a href="#">Meet our leadership <span aria-hidden="true">&rarr;</span></a>
            </div>
            <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
              <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Offices worldwide</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">12</dd>
              </div>
              <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Full-time colleagues</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">300+</dd>
              </div>
              <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Hours per week</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">40</dd>
              </div>
              <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Paid time off</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">Unlimited</dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
  <!-- COmpany logos -->
  <div class="bg-white py-14">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">Trusted by the world’s most innovative teams</h2>
      <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
        <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor" width="158" height="48">
        <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform" width="158" height="48">
        <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple" width="158" height="48">
        <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158" height="48">
        <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic" width="158" height="48">
      </div>
    </div>
  </div>
  

<!-- Promotion -->
<div class="bg-white">
    <div class="mx-auto max-w-7xl py-14 sm:px-6 lg:px-8">
      <div class="relative isolate overflow-hidden bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
        <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
          <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
          <defs>
            <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
              <stop stop-color="#7775D6" />
              <stop offset="1" stop-color="#E935C1" />
            </radialGradient>
          </defs>
        </svg>
        <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
          <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Boost your productivity.<br>Start using our app today.</h2>
          <p class="mt-6 text-lg leading-8 text-gray-300">Ac euismod vel sit maecenas id pellentesque eu sed consectetur. Malesuada adipiscing sagittis vel nulla.</p>
          <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
            <a href="#" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
            <a href="#" class="text-sm font-semibold leading-6 text-white">Learn more <span aria-hidden="true">→</span></a>
          </div>
        </div>
        <div class="relative mt-16 h-80 lg:mt-8">
          <img class="absolute left-0 top-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10" src="images/boost.png" alt="App screenshot" width="1824" height="1080">
        </div>
      </div>
    </div>
  </div>


  
  

  <!-- Footer -->
  <?php include("footer.php"); ?>