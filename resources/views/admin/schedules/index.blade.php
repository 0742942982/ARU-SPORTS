<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/a_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
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
            margin-top: 60px;
        }
    </style>
    <div class="container">
        <h1>Schedules</h1>
        <div class="row">
            @foreach ($schedules as $schedule)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Event ID: {{ $schedule->event_id }}</h5>
                        <p class="card-text">Start Time: {{ $schedule->start_time }}</p>
                        <p class="card-text">End Time: {{ $schedule->end_time }}</p>
                        <p class="card-text">Location: {{ $schedule->location }}</p>
                        <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST"style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-primary mt-2">Edit</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <footer>
        @include('users.footer')
    </footer>
</body>
</html>
