<!DOCTYPE html>
<html lang="en">
<head>
    @include('users.users_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
            background-color: #255760;
            height: 250px;
           
            align-items: center;
            justify-content: center;
            color: white;
        }
        .profile-container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="container profile-container mt-5">
        <h2>My Profile</h2>
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <td>{{ $user->fname }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ $user->lname }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{ $user->phone }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Profile Photo</th>
                <td>
                    @if($user->profile_photo)
                        <img src="{{ asset('uploads/profile_photos/' . $user->profile_photo) }}" alt="Profile Photo" class="img-thumbnail" style="width: 100px;">
                    @else
                        <p>No photo available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </td>
            </tr>
        </table>
    </div>
</div>
<footer>
    @include('users.footer')
</footer>
</body>
</html>
