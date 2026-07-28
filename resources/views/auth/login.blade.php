<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Warmindo</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 400px;
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, .12);
        }

        h2 {
            text-align: center;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 11px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 7px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        .role-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .role-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .role-option {
            flex: 1;
        }

        .role-option input {
            display: none;
        }

        .role-option label {
            display: block;
            text-align: center;
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            font-weight: normal;
            transition: .2s;
        }

        .role-option input:checked + label {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
        }

        button:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 7px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>

</head>

<body>

<div class="card">

    <h2>Warmindo</h2>

    <p class="subtitle">Silakan login ke akun Anda</p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">

        @csrf

        <div class="role-title">
            Login sebagai
        </div>

        <div class="role-container">

            <div class="role-option">
                <input
                    type="radio"
                    name="role"
                    id="admin"
                    value="admin"
                    required>

                <label for="admin">
                    👨‍💼 Admin
                </label>
            </div>

            <div class="role-option">
                <input
                    type="radio"
                    name="role"
                    id="kasir"
                    value="kasir"
                    required>

                <label for="kasir">
                    💳 Kasir
                </label>
            </div>

        </div>

        <label>Email</label>

        <input
            type="email"
            name="email"
            placeholder="Masukkan Email"
            value="{{ old('email') }}"
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

</body>
</html>