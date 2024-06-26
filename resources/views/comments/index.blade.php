<!DOCTYPE html>
<html lang="en">
<head>
    @include('users/users_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 35px;
        }
        body{
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Comments</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Your Comment</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ url('/u_dashboard') }}" class="btn btn-success">Go Back</a>
    </div>
</div>
<footer>
    @include('users/footer')
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
