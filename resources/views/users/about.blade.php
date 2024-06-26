<!DOCTYPE html>
<html lang="en">
<head>
    @include('users/user_header')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cssfiles/home2.css') }}">
    <style>
        body.classic {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .card {
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body1 {
            padding: 20px;
        }
        .card-text {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .text-center h2 {
            font-size: 30px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }
        .text-center p {
            font-size: 20px;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .testimonial {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .testimonial p {
            font-style: italic;
            font-size: 18px;
            color: #555;
        }
        .testimonial h5 {
            margin-top: 10px;
            font-weight: bold;
            color: #007bff;
        }
        ul {
            list-style-type: disc;
            margin-left: 20px;
        }
        ul li {
            margin-bottom: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body class="classic">

    <!-- Top Navigation -->
    

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="col-md-11 mx-auto">
            <div class="card">
                
                <div class="card-body1">
                    <h2 class="text-center">Welcome to the Ardhi University Sports Management System</h2>
                    <img src="{{ asset('images/page1.jpg') }}" class="card-img-top mb-4" alt="University Image">
                    <p class="card-text">Our system provides a comprehensive platform for students to engage in a variety of sports activities, manage teams, organize events, and much more. Whether you're a sports enthusiast or looking to explore new activities, ArU SpoRT has something for everyone.</p>
                    <p class="card-text">Join us today and embark on an exciting journey of fitness, teamwork, and fun! Experience the thrill of sportsmanship, improve your physical health, and make lasting friendships along the way.</p>

                   
                    <img src="{{ asset('images/page4.jpg') }}" class="card-img-top" alt="">
                    <h3 class="mt-4">Why Choose Us?</h3>
                    <ul>
                        <li>Access to a wide range of sports activities and facilities.</li>
                        <li>Opportunities to participate in local and national competitions.</li>
                        <li>Professional coaching and training sessions.</li>
                        <li>State-of-the-art sports equipment and venues.</li>
                        <li>A supportive community that fosters teamwork and personal growth.</li>
                    </ul>
                    <img src="{{ asset('images/page2.jpg') }}" class="card-img-top" alt="">

                    <div class="testimonial mt-4">
                        <p>"Joining the Ardhi University Sports Management System has been a game-changer for me. I've improved my skills, made great friends, and had a lot of fun!"</p>
                        <h5>- Alex Johnson, Student</h5>
                    </div>

                    <div class="testimonial mt-3">
                        <p>"The sports facilities are top-notch, and the coaching staff is incredibly supportive. I highly recommend it to anyone looking to stay active and engaged."</p>
                        <h5>- Maria Gonzales, Student</h5>
                    </div>
                     <!-- Video Section -->
                    <div class="text-center mt-4">
                        <video width="90%" height="4%" controls>
                            <source src="{{ asset('videos/video1.mp4.mp4') }}" type="video/mp4">
                            
                        </video>
                        
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ url('/register') }}" class="btn btn-success">Join Us Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        @include('users/footer')
    </footer>

</body>
</html>

