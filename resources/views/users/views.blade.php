<!DOCTYPE html>
<html lang="en">
<head>
    @include('users/users_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('cssfiles/admin_dashboard.css') }}">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .content-wrapper {
            flex: 1;
            padding: 20px;
        }

        .btn {
            margin: 0 2px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        #table {
            width: 100%;
        }

        .thead-dark {
            font-size: 17px;
        }

        .mb-2 {
            margin-top: 76px;
            text-align: center;
            font-size: 40px;
        }

        footer {
            height: 100px; /* Adjust the height as needed */
            background-color: #f8f9fa;
            text-align: center;
           
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <h2 class="mb-2">Community Members</h2>
        <table id="table" class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registration Number</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Course</th>
                </tr>
            </thead>
            <tbody>
          
                    
          
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->fname }} {{ $user->lname }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->registration_number}}</td>
                    <td>{{ $user->types->type}}</td>
                    <td>{{ $user->cors->course_name}}</td>
                    {{-- <td>{{ optional($user->course)->course_name ?? 'N/A' }}</td> --}}
                    
                </tr>
                @endforeach
        
                
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>

    <footer>
        @include('users/footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.querySelector(".hamburger a").addEventListener("click", function () {
            document.body.classList.toggle("active");
        });
    </script>
</body>
</html>
