<!-- resources/views/layouts/admin.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('cssfiles/admin_dashbord.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <div class="profile">
            <img src="{{ asset('images/admin.jpg') }}" alt="Profile Image">
            <h3>Ankito Ras</h3>
            <p>Sports Minister</p>
        </div>
        <ul>
            <li><a href="admin_dashbord" class="active"><span class="icon"><i class="fa-solid fa-house-heart"></i></span> Home</a></li>
            <li><a href="{{ route('admin.view_users') }}"><span class="icon"><i class="fa-solid fa-user"></i></span> View Users</a></li>
            <li><a href="#"><span class="icon"><i class="fa-solid fa-user"></i></span> View Schedule</a></li>
            <li><a href="#"><span class="icon"><i class="fa-regular fa-calendar-days"></i></span> View Events</a></li>
            <li><a href="#"><span class="icon"><i class="fa-duotone fa-bullhorn"></i></span> View Announcements</a></li>
            <li><a href="create_announce"><span class="icon"><i class="fa-duotone fa-bullhorn"></i></span> Add Announcement</a></li>
            <li><a href="create_schedule"><span class="icon"><i class="fa-duotone fa-bullhorn"></i></span> Add Schedule</a></li>
            <li><a href="create_event"><span class="icon"><i class="fa-solid fa-left-from-bracket"></i></span> Add Event</a></li>
            <li><a href="home"><span class="icon"><i class="fa-duotone fa-bullhorn"></i></span> Logout</a></li>
        </ul>
    </div>
    <div class="section">
        @yield('content')
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
