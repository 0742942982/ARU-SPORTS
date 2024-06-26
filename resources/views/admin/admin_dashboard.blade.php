<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/a_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('cssfiles/users_dashboard.css') }}">
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
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            margin-top: 0px;
            z-index: 1000;
            transition: left 0.3s ease;
        }
        .sidebar.active {
            left: -250px;
        }
        .sidebar .profile {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar .profile img {
            width: 100px;
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
            padding: 10px;
            transition: background 0.3s;
        }
        .sidebar ul li a:hover, .sidebar ul li a.active {
            background-color: #575757;
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
            background-color: rgb(243, 228, 243);
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: calc(100% - 250px);
            top: 0;
            left: 250px;
            margin-top: 60px;
            z-index: 1000;
            transition: left 0.3s ease, width 0.3s ease;
        }
        .top-navbar .hamburger {
            cursor: pointer;
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
        .content {
            margin-top: 60px;
            flex: 1;
        }
        .content h1 {
            font-size: 24px;
            font-weight: bold;
            margin-top: 70px;
            margin-bottom: 20px;
        }
        .card-deck .card {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color:  #575757;
            border: none;
        }
        .btn-primary:hover {
            background-color: black;
        }
           footer{
            background-color: #fb40ba;
           }
        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }
            .sidebar.active {
                left: 0;
            }
            .top-navbar {
                left: 0;
                width: 100%;
            }
            .top-navbar .search-container input {
                width: 200px;
            }
            .main-content {
                margin-left: 0; 
            }
            .hamburger {
                display: block;
            }
            .fas fa-bars{
                color: white;
            }
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
                <a href="u_dashboard" class="active">
                    <span class="icon"><i class="fa-solid fa-house-heart"></i></span> Home
                </a>
            </li>
            <li>
                <a href="users/views">
                    <span class="icon"><i class="fa-solid fa-user"></i></span> Users
                </a>
            </li>
            <li>
                <a href="users/schedules">
                    <span class="icon"><i class="fa-solid fa-calendar"></i></span>Add Schedules
                </a>
            </li>
            <li>
                <a href="users/schedules">
                    <span class="icon"><i class="fa-solid fa-calendar"></i></span>View Schedules
                </a>
            </li>
            <li>
                <a href="users/events">
                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>Add Event
                </a>
            </li>
            <li>
                <a href="users/events">
                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>View Events
                </a>
            </li>
            <li>
                <a href="users/announcements">
                    <span class="icon"><i class="fa-solid fa-bullhorn"></i></span>Add Announcement
                </a>
            </li>
            <li>
                <a href="users/announcements">
                    <span class="icon"><i class="fa-solid fa-bullhorn"></i></span>View Announcements
                </a>
            </li>
            <li>
                <a href="users/events">
                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>View Comments
                </a>
            </li>
            <li>
                <a href="home">
                    <span class="icon"><i class="fa-solid fa-left-from-bracket"></i></span> Logout
                </a>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="top-navbar">
            <div class="hamburger">
                <i class="fas fa-bars"></i>
            </div>
            <div class="search-container">
                <input type="text" placeholder="Search...">
            </div>
        </div>
        <div class="content container-fluid">
            <h1>Welcome to Your Dashboard</h1>
        </div>
    </div>
</div>

<script>
    document.querySelector(".hamburger").addEventListener("click", function() {
        document.querySelector(".sidebar").classList.toggle("active");
        document.querySelector(".main-content").classList.toggle("active");
        document.querySelector(".top-navbar").classList.toggle("active");
    });
</script>
</body>
</html>
