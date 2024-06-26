<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .wrapper {
            display: flex;
            width: 100%;
            flex: 1;
        }
        .sidebar {
            width: 250px;
            background-color: black;
            color: #fff;
            min-height: 100vh;
            padding-top: 10px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: left 0.3s ease;
        }
        .sidebar.active {
            left: -250px;
        }
        .sidebar .profile {
            text-align: left;
            margin-bottom: 10px;
        }
        .sidebar .profile img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
        }
        .sidebar .profile h3 {
            margin: 10px 0 5px;
            color: #fff;
        }
        .sidebar .profile p {
            color: #bbb;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #bbb;
            display: flex;
            align-items: center;
            padding: 7px;
            transition: background 0.3s;
        }
        .sidebar ul li a:hover, .sidebar ul li a.active {
            background-color: #255760;
            color: #fff;
        }
        .sidebar ul li a .icon {
            margin-right: 10px;
        }
        .main-content {
            display: flex;
            flex-direction: column;
            flex: 1;
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #255760;
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: calc(100% - 250px);
            top: 0;
            left: 250px;
            z-index: 1000;
            transition: left 0.3s ease, width 0.3s ease;
        }
        .top-navbar .hamburger h3 {
            font-size: 40px;
            color: white;
        }
        .top-navbar .search-container {
            display: flex;
            align-items: center;
        }
        .top-navbar .search-container input {
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 5px 15px;
            width: 300px;
            transition: width 0.4s ease-in-out;
        }
        .top-navbar .search-container input:focus {
            width: 400px;
        }
        .content-wrapper {
            flex: 1;
            padding: 20px;
            padding-top: 80px; /* Adjust to avoid overlap with navbar */
        }
        footer {
            text-align: center;
            padding: 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .container-fluid{
            padding: 40px;
        }
        .small-box .icon {
            position: absolute;
            top: -10px;
            right: 10px;
            z-index: 0;
            font-size: 90px;
            color: rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img src="{{ asset('images/admin.jpg') }}" alt="Profile Image">
                <h3>Admin Account</h3>
                <p>admin@gmail.com</p>
            </div>
            <ul>
                <li>
                    <a href="a_contents" class="active">
                        <span class="icon"><i class="fas fa-house-user"></i></span> Home
                    </a>
                </li>
                <li>
                    <a href="admin/a_view_users">
                        <span class="icon"><i class="fas fa-user"></i></span>View Users
                    </a>
                </li>
                <li>
                    <a href="schedules/create">
                        <span class="icon"><i class="fas fa-calendar-alt"></i></span>Add Schedules
                    </a>
                </li>
                <li>
                    <a href="schedules">
                        <span class="icon"><i class="fas fa-calendar-alt"></i></span>View Schedules
                    </a>
                </li>
                <li>
                    <a href="events/create">
                        <span class="icon"><i class="fas fa-calendar-day"></i></span>Add Event
                    </a>
                </li>
                <li>
                    <a href="events">
                        <span class="icon"><i class="fas fa-calendar-day"></i></span>View Events
                    </a>
                </li>
                <li>
                    <a href="announcements/create">
                        <span class="icon"><i class="fas fa-bullhorn"></i></span>Add Announcement
                    </a>
                </li>
                <li>
                    <a href="announcements">
                        <span class="icon"><i class="fas fa-bullhorn"></i></span>View Announcements
                    </a>
                </li>
                <li>
                    <a href="comments">
                        <span class="icon"><i class="fas fa-comments"></i></span>View Comments
                    </a>
                </li>
                <li>
                    <a href="/home">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span> Logout
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="top-navbar">
                <div class="hamburger">
                    <h3>Admin Dashboard</h3>
                </div>
                <div class="search-container">
                    <input type="text" placeholder="Search...">
                </div>
            </div>
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <!-- Small Box - Players -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>Players</h3>
                                        <center>
                                            <h3>{{$users_list_count->where('user_type', '1')->count()}}</h3>
                                        </center>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- Small Box - Sports Staff -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>Sports Staff</h3>
                                        <center>
                                            <h3>{{$users_list_count->where('user_type', '2')->count()}}</h3>
                                        </center>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- Small Box - Sports Fans -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>Sports Fans</h3>
                                        <center>
                                            <h3>{{$users_list_count->where('user_type', '3')->count()}}</h3>
                                        </center>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- Small Box - Total Users -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>Total Users</h3>
                                        <center>
                                            <h3>{{$users_list_count->count()}}</h3>
                                        </center>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- Small Box - Events -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>Events</h3>
                                        <center>
                                            <h3>{{$events_number->count()}}</h3>
                                        </center>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- Small Box - Announcements -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>Announcements</h3>
                                        <center>
                                            <h3>{{$announcement_number->count()}}</h3>
                                        </center>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- Small Box - Comments -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>Comments</h3>
                                        <center>
                                            <h3>{{$comments_number->count()}}</h3>
                                        </center>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- Small Box - Schedules -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>Schedules</h3>
                                        <center>
                                            <h3>{{$schedules_number->count()}}</h3>
                                        </center>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer>
                @include('users.footer')
            </footer>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
