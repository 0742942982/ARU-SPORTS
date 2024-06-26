<!DOCTYPE html>
<html lang="en">
<head>
    @include('users/users_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 35px;
            margin-left: 22px;
        }
        footer {
            height: 100px; /* Adjust the height as needed */
            background-color: #f8f9fa;
            text-align: center;
          
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Events</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($events) && count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->description}}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->start_time }}</td>
                        <td>{{ $event->end_time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No events found.</p>
    @endif
</div>
<footer>
    @include('users/footer')
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
