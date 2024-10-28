<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard_dr.css"> <!-- Existing dashboard CSS -->
    <link rel="stylesheet" href="css/sidebar.css"> <!-- Sidebar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <!-- Font Awesome for icons -->
</head>
<body>
<<<<<<< HEAD
    <div class="container-fluid">
        <div class="row">
            <!-- Include Sidebar -->
            <?php include 'sidebar.php'; ?>
=======
<aside>
        <img src="img/logo.png" alt="Logo"  width="90%">
      <br>
>>>>>>> 3fbfe76f8c57f567f75099d0e40e0dada37a875d

            <!-- Main Content -->
            <main class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <header class="dashboard-header my-4">
                    <h1>My Profile</h1>
                    <p class="lead">View and manage your profile information.</p>
                </header>
                
                <section class="profile-details bg-white p-4 rounded shadow-sm">
                    <h2 class="h4 mb-4">Personal Information</h2>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
                            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Role:</strong> <?php echo $_SESSION['role']; ?></p>
                            <p><strong>Last Login:</strong> <?php echo $_SESSION['last_login']; ?></p>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h2 class="h4 mb-4">Additional Details</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Department:</strong> <?php echo $_SESSION['department']; ?></p>
                            <p><strong>Employee ID:</strong> <?php echo $_SESSION['employee_id']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Access Level:</strong> <?php echo $_SESSION['access_level']; ?></p>
                            <p><strong>Join Date:</strong> <?php echo $_SESSION['join_date']; ?></p>
                        </div>
                    </div>
                </section>
                
                <div class="text-right mt-4">
                    <a href="edit_profile.php" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Edit Profile</a>
                </div>
            </main>
        </div>
    </div>

<<<<<<< HEAD
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
=======
        <a href="Schedule.php">
        <img src="img/clock.png" alt="myschedule" class="myschedule">

            <i class="fa fa-laptop"></i> Schedule
        </a>
        <a href="myProfile.php">
        <img src="img/myprofile.png" alt="myprofile" class="myprofile">

            <i class="fa fa-clone"></i> My Profile
        </a>
        <a href="SignOut.php">
        <img src="img/logout.png" alt="logout" class="logout">
            <i class="fa fa-trash-o"></i> Log Out
        </a>
    </aside>
    <?php
session_start();
echo "<h1>Your Profile</h1>";
echo "First Name: " .   $_SESSION["FName"]."<br>";
echo "Last Name: "  .	$_SESSION["LName"]."<br>";
echo "Email :"      .	$_SESSION["Email"]."<br>";
echo "Faculty: "    .	$_SESSION["Major"]."<br>";
echo "Minor: "      .   $_SESSION["Minor"]."<br>";
echo "Status:"      .   $_SESSION["Status"]."<br>";
echo "Semester GPA:".   $_SESSION["Sem gpa"]."<br>";
echo "CUM GPA:"     .   $_SESSION["Cum gpa"]."<br>";
echo "Semester CRDH:".   $_SESSION["Sem crdh"]."<br>";
echo "Total CRDH:"   .   $_SESSION["Total crdh"]."<br>";

echo"<a href='Dashboard.php'>Back</a>";

?>

>>>>>>> 3fbfe76f8c57f567f75099d0e40e0dada37a875d
</body>
</html>
