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
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('cssfiles/admin_dashbord.css') }}">
</head>
<body>

             <div class="form-container">
                <h2>Create Schedule</h2>
                <form id="create_schedule_form" class="was-validated" action="{{ route('admin.schedules.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="event_id">Event</label>
                        <select id="event_id" name="event_id" required>
                            <!-- Options should be dynamically generated from the events in the database -->
                            <option value="">Select Event</option>
                            <option value="1">Event 1</option>
                            <option value="2">Event 2</option>
                            <!-- Add more options here -->
                        </select>
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
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Create Schedule</button>
                    </div>
                </form>
            </div>
<script>
    document.querySelector(".hamburger a").addEventListener("click", function() {
        document.body.classList.toggle("active");
    });
</script>
<style>
    .form-container {
        max-width: 700px;
       top: 0;
      
        margin:auto;
        z-index: 1000;
        width: 60%;
        padding-top: 0px;
        margin-top: 5rem;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .form-container h2 {
        text-align: center;
    }
    .form-group {
      
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
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
    body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
</style>
<footer>
    @include('users.footer')
</footer>
</body>
</html>


