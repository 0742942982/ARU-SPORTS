<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/a_header')
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
                <th>Actions</th> <!-- Add this column for actions -->
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
                    <td>
                        <!-- Delete button -->
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-primary btn-sm">Update</a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .container{
       margin-top: 35px;
        margin-left: 22px;

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
