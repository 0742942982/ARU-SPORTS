<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/admin_header');
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
<div class="container ">
    <h2>Events</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div class="table_content">
    @endif
    <table class="table">
        <thead>
            <tr>
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
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->start_time }}</td>
                    <td>{{ $event->end_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .container{
       margin-top: 35px;
        margin-left: 220px;

    }
</style>
</body>
</html>
