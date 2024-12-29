<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/styless.css">
</head>
<body>
<div class="form-container">
    <h1>Inscription</h1>
   
    <form method="POST">
        <input type="text" name="name" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="register">S'inscrire</button>
    </form>
    <p>Déjà inscrit ? <a href="login.php">Connectez-vous</a></p>
</div>
</body>
</html>
<?php
include_once("../classPhp/Connection.php");
require_once 'user.php';

$conn = new Connection("localhost", "root", "root", "societe");
$user = new User($conn->connection);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = $user->register($name, $email, $password);
    echo $message;
}
?> 
