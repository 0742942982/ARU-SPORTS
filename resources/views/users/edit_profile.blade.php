<!DOCTYPE html>
<html lang="en">
<head>
    @include('users.users_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .profile-container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container profile-container mt-5">
    <h2>Edit Profile</h2>

    @if(session('update_success'))
        <script>
            alert('Profile updated successfully');
        </script>
    @endif

    {{-- <form action="{{ route('profile.show') }}" method="POST" enctype="multipart/form-data"autocomplete="off"> --}}
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" value="{{ $user->fname }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" value="{{ $user->lname }}" required>
        </div>
           
        <div class="form-group mb-3">
            <label for="lname">Phone Number</label>
            <input type="number" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="password">Password (leave blank to keep current password)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group mb-3">
            <label for="profile_photo">Profile Photo</label>
            <input type="file" class="form-control-file" id="profile_photo" name="profile_photo">
            @if($user->profile_photo)
                <img src="{{ asset('uploads/profile_photos/' . $user->profile_photo) }}" alt="Profile Photo" class="img-thumbnail mt-2" style="width: 100px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
<footer>
    @include('users.footer')
</footer>
</body>
</html>
