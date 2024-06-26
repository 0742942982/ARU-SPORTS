<!DOCTYPE html>
<html lang="en">
<head>
    @include('users/users_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 35px;
            margin-left: 22px;
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
    <h2>Schedules</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($schedules) && count($schedules) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Event Id</th>
                    <th>Description</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->event_id }}</td>
                        <td>{{ $schedule->event_description}}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>{{ $schedule->location}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No schedules found.</p>
    @endif
</div>
<footer>
    @include('users/footer')
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
