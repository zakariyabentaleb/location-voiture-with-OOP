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
    public function reserver($car_id, $user_id) {
        // Vérifiez si la voiture est déjà réservée
        $sql = "SELECT id FROM reservations WHERE car_id = ? AND status IN ('pending', 'confirmed')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $car_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) { // Si aucune réservation n'existe
            // Enregistrez la réservation
            $sql = "INSERT INTO reservations (user_id, car_id, start_date, end_date, status)
                    VALUES (?, ?, NOW(), DATE_ADD(NOW(), INTERVAL 7 DAY), 'pending')";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $user_id, $car_id);
    
            if ($stmt->execute()) {
                return true; // Réservation réussie
            }
        }
        return false; // La voiture est déjà réservée ou une erreur est survenue
    }
    
}
?>

