<?php

include_once("./classPhp/Connection.php");
include_once("./auth/user.php");

session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "Vous devez être connecté pour réserver une voiture."]);
    exit();
}

if (isset($_GET['id'])) {
    $car_id = intval($_GET['id']);
    $user_id = $_SESSION['user_id'];

    $conn = new Connection("localhost", "root", "root", "societe");
    $user = new User($conn->connection);

    if ($user->reserver($car_id, $user_id)) {
        header("Location: /reservation.php");;
    } else {
        echo json_encode(["success" => false, "message" => "La voiture est déjà réservée ou une erreur est survenue."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Aucune voiture spécifiée."]);
}
?>
