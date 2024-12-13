<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
        }
        .form-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        .form-box h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-box form {
            display: flex;
            flex-direction: column;
        }
        .form-box label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .form-box input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .form-box button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: white;
            cursor: pointer;
        }
        .form-box button[type="submit"] {
            background-color: #1d4ed8;
            transition: background-color 0.3s;
        }
        .form-box button[type="submit"]:hover {
            background-color: #2563eb;
        }
        .form-box .secondary-button {
            background-color: #10b981;
        }
        .form-box .secondary-button:hover {
            background-color: #059669;
        }
        .form-box p {
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .form-box p a {
            color: #1d4ed8;
            text-decoration: none;
        }
        .form-box p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container" id="login">
        <div class="form-box">
            <h2>Login</h2>
            <form action="/login" method="POST">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="/register.php">Register</a></p>
        </div>
    </div>

    
</body>
</html>
