<!DOCTYPE html>
<html lang="en">
<head>
  @include('users/user_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cssfiles/home.css') }}">
    <style>
        body.classic {
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
     
        .header {
            text-align: center;
          padding-top: 209px;
           
            color: white;
        }
        .header h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
        }
        .header p {
            font-size: 1.5em;

            margin-bottom: 40px;
        }
       
       
    </style>
</head>
<body class="classic">


  <!-- Header Section -->
  <div class="header">
      <h1>Welcome to ArU SpoRTs</h1>
      <p>Discover, Engage, and Excel in Your Favorite Sports Activities</p>
      <a href="register" class="btn btn-success btn-lg">Join Us Now</a>
      <a href="about" class="btn btn-secondary btn-lg">See More</a>
  </div>

  <!-- Features Section -->


  <footer>
    @include('users/footer')
  </footer>

</body>
</html>

