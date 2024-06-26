<!DOCTYPE html>
<html lang="en">
<head>
    @include('users/user_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARU Sport</title>
    <link rel="stylesheet" href="{{ asset('form/css.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="form-bg">
    @if(session('registration_failed'))
        <script type="text/javascript">
            alert('This Account exists');
        </script>
    @endif

    <center>
        <div id="anno" class="content-wrapper">
            <form id="create_account" class="row g-3 needs-validation" action="{{ route('register_check') }}" method="POST" enctype="multipart/form-data" novalidate autocomplete="off">
                @csrf
                <div id="anno_title">
                    <h3 class="an_title">Create Account</h3>
                </div>

                <div id="userType" class="col-md-6 position-relative">
                    <label for="user_type" class="form-label">User Type</label>
                    <select name="user_type" id="user_type" class="form-select form-control" onchange="toggleField()" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach($user_types as $user_type)
                            <option value="{{ $user_type->id }}">{{ $user_type->type }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-tooltip">Please select a user type.</div>
                </div>

                <div class="col-md-6 position-relative">
                    <label for="fname" class="form-label">First Name</label>
                    <input name="fname" type="text" class="form-control" id="fname" required>
                    <div class="valid-tooltip">Looks good!</div>
                </div>

                <div class="col-md-6 position-relative">
                    <label for="lname" class="form-label">Last Name</label>
                    <input name="lname" type="text" class="form-control" id="lname" required>
                    <div class="valid-tooltip">Looks good!</div>
                </div>

                <div class="col-md-6 position-relative">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select form-control" id="gender" name="gender" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <div class="invalid-tooltip">Please select a gender.</div>
                </div>

                <div id="sportType" class="col-md-6 position-relative">
                    <label for="sport_type" class="form-label">Sport Type</label>
                    <select class="form-select form-control" id="sport_type" name="sport_type">
                        <option selected disabled value="">Choose...</option>
                        @foreach($sport_types as $sport_type)
                            <option value="{{ $sport_type->id }}">{{ $sport_type->sport_type }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-tooltip"></div>
                </div>

                <div class="col-md-6 position-relative">
                    <label for="phone" class="form-label">Phone</label>
                    <input name="phone" type="text" class="form-control" id="phone" required>
                    <div class="valid-tooltip">Looks good!</div>
                </div>

                <div id="gradFields" class="col-md-6 position-relative" style="display:none;">
                    <label for="registration_number" class="form-label">Registration Number</label>
                    <input name="registration_number" type="text" class="form-control" id="registration_number">
                    <div class="valid-tooltip"></div>
                </div>

                <div id="courseList" class="col-md-6 position-relative">
                    <label for="courseValue" class="form-label">Course</label>
                    <select name="course" id="courseValue" class="form-select form-control" onchange="checkValue()" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                        <option value="other">Others</option>
                    </select>
                    <div class="invalid-tooltip">Please select a course.</div>
                </div>

                <div id="courseField" class="col-md-6 position-relative" style="display:none;">
                    <label for="written_course" class="form-label">Write Your Course</label>
                    <input name="written_course" type="text" class="form-control" id="written_course">
                    <div class="valid-tooltip"></div>
                </div>

                <div class="col-md-6 position-relative">
                    <label for="file" class="form-label">Profile Photo</label>
                    <input name="profile_photo" type="file" class="form-control" id="profile_photo">
                    <div class="invalid-tooltip"></div>
                </div>

                <div class="col-md-6 position-relative">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" required>
                    <div class="invalid-tooltip">Please provide a valid email.</div>
                </div>

                <div class="col-md-6 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                    <div class="invalid-tooltip">Please provide a password.</div>
                </div>

                <center>
                    <div id="sbmt_btn" class="col-md-6">
                        <button class="btn btn-success" type="submit" name="submit">Register</button>
                    </div>
                </center>
            </form>
        </div>
    </center>
    <footer>
        @include('users/footer')
      </footer>
    <style>
        /* Style adjustments */
        #anno {
            position: relative;
          
            margin-bottom: 90px;
            display: inline-block;
        }
        #anno_title {
            background-color: white;
            padding: 10px 10px;
            margin-bottom: 1%;
        }
        form{
            background-color: #255760;
           
        }
        form label{
            color: white;
        }
        .an_title {
            color: black;
            margin-top: 10%;
            font-size: 40px;
        }
        footer{
            height: 170px;
        }
        #sbmt_btn {
            width: 200px;
            margin-top: 20px;
        }
        #gradFields, #courseField {
            display: none;
        }
        #create_account .form-control {
            width: 80%;
        }
        
        #create_account {
            width: 50%;
            border: 2px solid white;
            box-shadow: 0 2px 4px rgba(202, 16, 152, 0.2);
            transition: 0.3s ease;
        }
        #create_account:hover {
            box-shadow: 0 8px 16px 0 rgba(209, 9, 119, 0.2);
        }
    </style>

<script>
    function toggleField() {
        var userType = document.getElementById('user_type').value;
        var gradFields = document.getElementById('gradFields');
        var sportType = document.getElementById('sportType');
        var courseList = document.getElementById('courseList');

        if (userType==='2') {
            gradFields.style.display = 'block';
            sportType.style.display = 'none';
            courseList.style.display = 'block';
        } 
        else if (userType==='3') {
            gradFields.style.display = 'block';
            sportType.style.display = 'none';
            courseList.style.display = 'block';
        } 
        else {
            gradFields.style.display = 'block';
            sportType.style.display = 'block';
            courseList.style.display = 'block';
        }
    }

    function checkValue() {
        var courseField = document.getElementById('courseField');
        var courseValue = document.getElementById('courseValue').value;

        if (courseValue === 'other') {
            courseField.style.display = 'block';
        } else {
            courseField.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        'use strict';

        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    });
</script>

</body>
</html>
