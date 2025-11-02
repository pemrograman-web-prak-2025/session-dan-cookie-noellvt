<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kenalan Manager')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background: #f2f2f7;
            min-height: 100vh;
            padding: 20px;
            color: #1d1d1f;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 30px;
            overflow: hidden; 
        }

        .navbar {
            background: transparent;
            padding: 0;
            padding-bottom: 20px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e5e5;
        }
        .navbar h1 {
            color: #1d1d1f;
            font-size: 28px;
            font-weight: 600;
        }
        .navbar .user-info {
            color: #333;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            font-weight: 600; 
            transition: all 0.2s ease-in-out;
        }
        .btn:hover {
            filter: brightness(0.9);
        }
        
        .btn-primary {
            background: #007aff;
            color: white;
        }
        .btn-danger {
            background: #ff3b30;
            color: white;
        }
        .btn-warning {
            background: #ff9500;
            color: white;
        }
        .btn-success {
            background: #34c759;
            color: white;
        }

        .alert {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            border: none; 
            font-size: 15px;
        }
        .alert-success {
            background: #e6f7eb;
            color: #1e4620;
        }
        .alert-error {
            background: #ffebe9;
            color: #5f2120;
        }
        .alert-error ul {
            margin-left: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 14px 10px; 
            text-align: left;
            border-bottom: 1px solid #e5e5e5; 
        }
        tr:last-child th,
        tr:last-child td {
            border-bottom: none;
        }
        th {
            background: #f9f9f9;
            font-weight: 600;
            color: #555;
            font-size: 14px;
        }
        td {
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 15px;
            color: #333;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #c7c7cc;
            border-radius: 10px;
            font-size: 15px;
            font-family: system-ui, -apple-system, sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #007aff;
            box-shadow: 0 0 0 3px rgba(0,122,255,0.2);
        }

    </style>
</head>
<body>
    <div class="container">
        @auth
        <div class="navbar">
            <h1>Kenalan Manager</h1>
            <div class="user-info">
                <span>Halo, {{ Auth::user()->name }}!</span>
                @if(session('login_time'))
                <span style="font-size: 12px; opacity: 0.8;">Login: {{ session('login_time') }}</span>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
        @endauth

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-error">
            <ul style="margin-left: 20px;">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </div>
</body>
</html>