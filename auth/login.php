<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/styless.css">
</head>
<body>
<div class="form-container">
    <h1>Connexion</h1>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="login" >Se connecter</button>
    </form>
    <p>Pas encore inscrit ? <a href="register.php">Inscrivez-vous</a></p>
</div>
</body>
</html>
<?php
include_once("../classPhp/Connection.php");
require_once 'user.php';
$conn = new Connection("localhost", "root", "root", "societe");
$user = new User($conn->connection);
if (isset($_POST['login'])) {
$email = $_POST['email'];
$password = $_POST['password'];
if ($user->login($email, $password)) {
    if ($_SESSION['role'] ==='admin') {
        header("Location: /index.php"); // Redirige vers l'index
        exit();
    } else {
        echo "Vous n'avez pas les permissions nécessaires.";
    }
} else {
    echo "Email ou mot de passe incorrect.";
}
}
?>