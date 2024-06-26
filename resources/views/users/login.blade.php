<!DOCTYPE html>
<html>
<head>
    @include('users/user_header')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('cssfiles/login.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
       
    </style>
</head>
<body>
    <div class="content">
        <div class="wrapper">
            <form id="create-account-form" class="create_account" action="{{ route('login_check') }}" method="POST" autocomplete="off">
                @csrf
                <center>
                    @if(session('login_failure'))
                        <div id="red_alert" class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill"/>
                            </svg>
                            <div>
                                Incorrect Email or Password
                            </div>
                        </div>
                    @endif
                    <div id="anno_title">
                        <h3 class="an_title">Welcome Back</h3>
                    </div>
                </center>
                <div class="input_box">
                    <input type="email" placeholder="Enter Email" name="email" required>
                    <i class='bx bxs-user-circle'></i>
                </div>
                <div class="input_box">
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="remember_forgot">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="register_link">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <footer>
        @include('users/footer')
    </footer>
</body>
</html>
