<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #7FB3D5;
            color: #F2F4F4;
        }

        .sidebar {
            background-color: #2980B9;
            height: 100vh;
            padding: 20px 0;
        }

        .sidebar a {
            color: #F2F4F4;
            font-size: 20px;
            display: block;
            margin: 40px 10px 10px 10px;
            text-decoration: none;
            padding: 15px;
            border-radius: 15px;
            background-color: #2471A3;
            box-shadow: 0px 5px 5px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #1A5276;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.4);
            transform: translateY(-2px);
        }

        .sidebar a:active {
            box-shadow: none;
            transform: translateY(2px);
        }

        .content {
            padding: 20px;
        }

        .title {
            font-size: 32px;
            font-weight: bold;
        }
        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-bottom {
            margin-top: auto;
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <ul>
                    <li><a href="{{ route('viewusers') }}">Users</a></li>
                    <li><a href="{{ route('viewassessments') }}">Assessments</a></li>
                    <li><a href="{{ route('viewjournals') }}">Journals</a></li>
                </ul>
                <div class="sidebar-bottom">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
                    </form>
                </div>
            </div>
            <div class="col-md-10 content">
                <h1 class="title">Admin Dashboard</h1>
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>






