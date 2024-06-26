<!-- resources/views/admin/events/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/a_header');
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
</style>
<div class="container">
    <h2>Edit Event</h2>
    <!-- Form for editing event details -->
    <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Form fields for event details -->
        <div class="mb-3">
            <label for="event_name" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="event_name" name="event_name" value="{{ $event->event_name }}">
        </div>
        <div class="mb-3">
            <label for="event_description" class="form-label">Event Description</label>
            <textarea class="form-control" id="event_description" name="event_description">{{ $event->event_description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}">
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ date('Y-m-d\TH:i', strtotime($event->start_time)) }}">
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ date('Y-m-d\TH:i', strtotime($event->end_time)) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<footer>
    @include('users.footer')
</footer>
</body>
</html>
