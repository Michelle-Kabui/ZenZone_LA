<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <style>
        body {
            background-color: #7FB3D5;
            font-family: sans-serif-condensed;
            color: #F2F4F4;
        }
        .container {
            background-color: #F2F3F4;
            margin: 2rem;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 2px 2.62px rgba(0, 0, 0, 0.23);
        }
        h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #2C3E50;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            font-weight: bold;
            color: #2C3E50;
        }
        input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #2980B9;
            color: #F2F4F4;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Registration</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('adminreg')}}" method="POST">
            @csrf 

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>
