
<?php
require_once "auth.php";

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Inventaris</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-box {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 7px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        button {
            width: 100%;
            padding: 13px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fee2e2;
            color: #dc2626;
            padding: 12px;
            border-radius: 7px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="login-container">
    <div class="login-box">

        <h2>Login Inventaris</h2>
        <p class="subtitle">Silakan masuk ke akun Anda</p>

        <?php if (isset($_GET['error'])): ?>
            <div class="error">
                username / password tidak sesuai
            </div>
        <?php endif; ?>

        <form action="proses_login.php" method="POST">

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username"
                       placeholder="Masukkan username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password"
                       placeholder="Masukkan password" required>
            </div>

            <button type="submit" name="login">Login</button>

        </form>

    </div>
</div>

</body>
</html>
