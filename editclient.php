<?php

include_once("./classPhp/Connection.php");
include_once("./classPhp/Crud.php");

$crud = new Crud("localhost", "root", "azl,kkk!", "societe");
$id = $_GET["id"];
$sql_command_get = "SELECT nom, adresse, numerotelephone FROM clientt WHERE id = {$id}";


$nom = "";
$adresse = "";
$numberphone = "";

if ($id > 0 && $_SERVER["REQUEST_METHOD"] === "GET") {
    $result = $crud->afficher($sql_command_get);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nom = $row["nom"];
        $adresse = $row["adresse"];
        $numberphone = $row["numerotelephone"];
    } else {
        echo "Aucun client trouvé avec cet ID.";
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $numberphone = $_POST["numberphone"];
    $sql_command_post = "UPDATE clientt SET nom = '{$nom}', adresse = '{$adresse}', numerotelephone = '{$numberphone}' WHERE id = {$id}";
    // $connection->query("UPDATE clientt SET nom = '$nom', adresse = '$adresse', numerotelephone = '$numberphone' WHERE id = $id");
    $crud->updateEditClient($id, $nom, $adresse, $numberphone);
    header("location: /index.php");
}




?>


<!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contrats de Location - CODE-PARC</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <aside class="sidebar">
        <div class="logo">
          <h1>MYPARC</h1>
        </div>
        <nav>
          <ul>
            <li><a href="./index.php"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="./car.php"><i class="fa-solid fa-car"></i></a></li>
            <li><a href="./contrats.php"><i class="fa-solid fa-file-contract"></i></a></li> 
          </ul>
        </nav>
      </aside>
      <main>
      <header>
        <h2 class="titre">ADD NEW CLIENT</h2>
      </header>
      <form class="tarif-form" method="post">
  <div class="form-group">
    <label for="nom">Nom Complet</label>
    <input type="text" name="nom"  value="<?php echo $nom ; ?>" required>
  </div>
  <div class="form-group">
    <label for="adresse">Adresse</label>
    <input type="text" name="adresse"  value="<?php echo $adresse ; ?>" required>
  </div>
  <div class="form-group">
    <label for="numberphone">Numéro de téléphone</label>
    <input type="text" name="numberphone"  value="<?php echo $numberphone ; ?>" required pattern="[0-9]{10}">
  </div>
  <div class="form-buttons">
    <button  class="btn-cancel">Annuler</button>
    <button type="submit" class="btn-save">Enregistrer</button>
  </div>
</form>
      </main>
    </div>
  </body>
  </html>

