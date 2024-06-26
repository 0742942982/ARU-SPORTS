<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/a_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('cssfiles/admin_dashbord.css') }}">
</head>
<body>

    
    <!-- Display success or error messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-container">
        <h2>Create Event</h2>
        <form action="{{ route('admin.events.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="event_name">Event Name</label>
                <input type="text" id="event_name" name="event_name" required>
            </div>
            <div class="form-group">
                <label for="event_description">Event Description</label>
                <textarea id="event_description" name="event_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="datetime-local" id="start_time" name="start_time" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="datetime-local" id="end_time" name="end_time" required>
            </div>
            <div class="form-group">
                <button type="submit">Create Event</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<script>
document.querySelector(".hamburger a").addEventListener("click", function () {
    document.body.classList.toggle("active");
});
</script>
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
    .form-container {
        max-width: 700px;
        margin: auto;
        z-index: 1000;
        width: 55%;
        padding-top: 0px;
        margin-top: 4rem;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .form-container h2 {
        text-align: center;
        font-size: 28px;
    }

    .form-group {
        margin-bottom: 5px;
    }

    .form-group label {
        display: block;
        margin-bottom: 1px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

    .form-group textarea {
        height: 100px;
    }

    .form-group button {
        width: 100%;
        padding: 10px;
        background-color: purple;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: darkpurple;
    }
</style>
<footer>
    @include('users.footer')
</footer>
</body>
</html>
