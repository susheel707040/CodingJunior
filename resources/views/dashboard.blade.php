<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 20px auto;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .header {
            background-color: pink; /* Pink color */
            padding: 20px 0;
            text-align: center;
        }
        .footer {
            background-color: lightblue;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: pink;">
            <a class="navbar-brand" href="{{route('admin.dashboard')}}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span class="navbar-text">
                           Name: {{ Auth::user()->name }} ({{ Auth::user()->email }})
                        </span>
                    </li>
                    <form action="{{route('admin.logout')}}" method="post" >
                        @csrf
                        <button type="submit" class="btn dropdown-item notify-item ">
                            <i class="fa fa-power-off"></i> <span>Logout</span>
                        </button>
                    </form>

                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2>User List</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($users as $data)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <footer class="footer">
        <div class="container">

