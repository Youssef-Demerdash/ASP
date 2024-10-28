<aside class="sidebar">
    <div class="sidebar-header">
        <img src="img/logo.png" alt="Logo" class="sidebar-logo">
    </div>

    <nav class="sidebar-nav">
        <a href="dashboard_dr.php" class="nav-link">
            <img src="img/dashboard.png" alt="Dashboard" class="nav-icon">
            <span>Dashboard</span>
        </a>

        <a href="Schedule.php" class="nav-link">
            <img src="img/clock.png" alt="Schedule" class="nav-icon">
            <span>Schedule</span>
        </a>

        <a href="myProfile.php" class="nav-link">
            <img src="img/myprofile.png" alt="My Profile" class="nav-icon">
            <span>My Profile</span>
        </a>

        <a href="SignOut.php" class="nav-link">
            <img src="img/logout.png" alt="Log Out" class="nav-icon">
            <span>Log Out</span>
        </a>
    </nav>
</aside>

<style>
    /* Basic Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Sidebar Styling */
    .sidebar {
        width: 250px;
        height: 100vh;
        background-color: #2c3e50;
        color: #ecf0f1;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
    }

    .sidebar-header {
        margin-bottom: 20px;
    }

    .sidebar-logo {
        max-width: 100px;
    }

    .sidebar-nav {
        width: 100%;
    }

    .nav-link {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 15px 20px;
        text-decoration: none;
        color: #ecf0f1;
        transition: background-color 0.3s;
    }

    .nav-link:hover {
        background-color: #34495e;
    }

    .nav-icon {
        width: 24px;
        height: 24px;
        margin-right: 10px;
    }

    .nav-link span {
        font-size: 1.1em;
    }

    .sidebar .nav-link.active {
        background-color: #1abc9c;
    }
</style>






















<!-- <aside class="sidebar">
    <div class="sidebar-header">
        <img src="img/logo.png" alt="Logo">
    </div>

    <a href="dashboard_dr.php" class="nav-link">
        <img src="img/dashboard.png" alt="dashboard" class="dashboard">
        <i class="fa fa-user-o"></i> Dashboard
    </a>

    <a href="Schedule.php" class="nav-link">
        <img src="img/clock.png" alt="myschedule" class="myschedule">
        <i class="fa fa-laptop"></i> Schedule
    </a>

    <a href="myProfile.php" class="nav-link">
        <img src="img/myprofile.png" alt="myprofile" class="myprofile">
        <i class="fa fa-clone"></i> My Profile
    </a>

            <i class="fa fa-clone"></i> My Profile
        </a>

        <a href="SignOut.php">
        <img src="img/logout.png" alt="logout" class="logout">
        <i class="fa fa-trash-o"></i> Log Out
    </a>
</aside> -->
