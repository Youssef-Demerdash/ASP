<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Welcome to OnCampus. Log in to access your account." />
    <meta name="keywords" content="welcome, login, platform, student services" />
    <title>Welcome to OnCampus</title>
    
    <link rel="stylesheet" href="css/welcome.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
</head>

<body class="bg-gradient-to-r from-blue-400 to-blue-600 min-h-[80vh] flex flex-col justify-center py-8">
<br><br>
    <div class="flex flex-col items-center mb-6 text-center">
        <br><br>
        <img src="img/logo.png" alt="Company Logo" class="w-24 mb-2" />
        <h1 class="text-3xl md:text-4xl text-white font-bold">Welcome to OnCampus</h1>
        <p class="text-md md:text-lg text-white mt-1">Your one-stop platform for academic success.</p>
    </div>

    <div class="container mx-auto flex flex-wrap flex-col md:flex-row items-center justify-center mb-6">
        <!-- Left Col -->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-center text-center md:text-left mb-6 md:mb-0">
            <a href="Login.php" class="styled-btn mb-4 px-4 py-2 rounded-lg text-md bg-white text-blue-600 hover:bg-blue-500 hover:text-white transition duration-300">Log In</a>
            <a href="SignUp.php" class="styled-btn px-4 py-2 rounded-lg text-md bg-white text-blue-600 hover:bg-blue-500 hover:text-white transition duration-300">Sign Up</a>
        </div>

        <!-- Right Col -->
        <div class="w-full md:w-3/5 py-4 text-center">
            <img class="w-full md:w-4/5 z-50" src="img/hero.png" alt="Hero Image" />
        </div>
    </div>
    
    <div class="wave-section mt-6">
        <svg viewBox="0 0 1428 174" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.1"></path>
            <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.1"></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.2"></path>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
            </g>
        </svg>
    </div>
    
</body>
</html>