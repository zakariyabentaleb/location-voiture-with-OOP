<?php
class User {
    private $conn;

    public function __construct($db_conn) {
        $this->conn = $db_conn;
    }

    // Inscription
    public function register($name, $email, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (nom, email, password) VALUES ('$name', '$email', '$passwordHash')";
        return $this->conn->query($sql);
    }

    // Connexion
    public function login($email, $password) {
        $sql = "SELECT id, nom, password,role FROM users WHERE email = '$email'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nom'];
                $_SESSION['role'] = $user['role'];
                return true;
            }
        }
        return false;
    }
}
?>

