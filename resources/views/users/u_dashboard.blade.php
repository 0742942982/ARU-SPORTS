<!DOCTYPE html>
<html lang="en">
<head>
    @include('users.users_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('cssfiles/users_dashbord.css') }}">
</head>
<body>
    
<div class="wrapper">
    <div class="sidebar">
        <div class="profile">
            <img src="{{ Auth::user()->profile_photo ? asset('uploads/profile_photos/' . Auth::user()->profile_photo) : asset('images/u.jpg') }}" alt="Profile Image">
            <h3>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h3>
            <p>{{ Auth::user()->email }}</p>
        </div>
        <ul>
            <li>
                <a href="{{ route('u_dashboard') }}" class="active">
                    <span class="icon"><i class="fas fa-house-user"></i></span> Home
                </a>
            </li>
            <li>
                <a href="{{ route('profile.show') }}">
                    <span class="icon"><i class="fa-solid fa-user"></i></span> My Profile
                </a>
            </li>
            <li>
                <a href="users/views">
                    <span class="icon"><i class="fa-solid fa-user"></i></span> Users
                </a>
            </li>
            <li>
                <a href="users/schedules">
                    <span class="icon"><i class="fa-solid fa-calendar"></i></span> Schedules
                </a>
            </li>
            <li>
                <a href="users/events">
                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span> Event
                </a>
            </li>
            <li>
                <a href="users/announcements">
                    <span class="icon"><i class="fa-solid fa-bullhorn"></i></span> Announcement
                </a>
            </li>
            <li>
                <a href="home">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span> Logout
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
            <h1 class="dash1">Welcome to Your Dashboard</h1>
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">View and manage user profiles, including players and fans.</p>
                        <a href="users/views" class="btn btn-primary">View Users</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Upcoming Schedules</h5>
                        <p class="card-text">Stay updated with the latest sports schedules and events. Don't miss out!</p>
                        <a href="users/schedules" class="btn btn-primary">View Schedules</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Events</h5>
                        <p class="card-text">Plan and manage sports events and competitions.</p>
                        <a href="users/events" class="btn btn-primary">View Events</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Announcements</h5>
                        <p class="card-text">Keep up with the latest news and announcements in the sports community.</p>
                        <a href="users/announcements" class="btn btn-primary">View Announcements</a>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            @include('users.footer')
        </footer>
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
