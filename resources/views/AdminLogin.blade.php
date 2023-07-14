<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #7FB3D5;
            color: #F2F4F4;
        }

        .container {
            max-width: 500px;
            margin: auto;
            padding-top: 50px;
        }

        .alert {
            color: #2C3E50;
            background-color: #F2F3F4;
            border-radius: 20px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 20px;
            font-weight: bold;
        }

        .form-control {
            border-radius: 20px;
            border: none;
            padding: 15px 20px;
            font-size: 16px;
            color: #808B96;
        }

        .btn {
            color: #F2F4F4;
            background-color: #2980B9;
            font-size: 20px;
            border-radius: 20px;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Admin Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('adminlog') }}" method="POST">
            @csrf 

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
