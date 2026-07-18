<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Warmindo</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f4f4;
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 400px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: gray;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }
    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h2>Warmindo</h2>

        <p>Login Admin / Kasir</p>

        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="Masukkan Email"
                required>

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan Password"
                required>

            <button type="submit">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>