<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/a_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
        .container{
            margin-top: 50px;
        }
    </style>
    <div class="container">
        <h1>Edit Schedule</h1>
        <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="event_id">Event ID:</label>
                <input type="text" class="form-control" id="event_id" name="event_id" value="{{ $schedule->event_id }}" required>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="text" class="form-control" id="start_time" name="start_time" value="{{ $schedule->start_time }}" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="text" class="form-control" id="end_time" name="end_time" value="{{ $schedule->end_time }}" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $schedule->location }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Schedule</button>
        </form>
    </div>
    <footer>
        @include('users.footer')
    </footer>
</body>
</html>
