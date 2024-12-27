<?php

$connection = new mysqli("localhost", "root", "azl,kkk!", "societe");
if ($connection->connect_error) {
    die("Erreur de connexion : " . $connection->connect_error);
}


$id = $_GET["id"];

$marque = "";
$modèle = "";
$année = "";
$numeromattr = "";

if ($id > 0 && $_SERVER["REQUEST_METHOD"] === "GET") {
    $result = $connection->query("SELECT marque,modèle,année,numeromattr FROM voiture WHERE id = $id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $marque = $row["marque"];
        $modèle = $row["modèle"];
        $année =  $row["année"] ;
        $numeromattr =  $row["numeromattr"];
    } else {
        echo "Aucun voiture trouvé avec cet ID.";
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $marque = $_POST["marque"];
        $modèle = $_POST["model"];
        $année = $_POST["annee"] ;
        $numeromattr = $_POST["numeromattr"];
    $connection->query("UPDATE voiture SET marque = '$marque', modèle = '$modèle', année = '$année', numeromattr='$numeromattr' WHERE id = $id");
    header("location: /car.php");
}



$connection->close();
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
    <label for="numeromattr">numeromattr</label>
    <input type="text" name="numeromattr" value="<?php echo $numeromattr ; ?>" required>
  </div>
  <div class="form-group">
    <label for="marque">marque</label>
    <input type="text" name="marque" value="<?php echo $marque ; ?>" required>
  </div>
  <div class="form-group">
    <label for="model">model</label>
    <input type="text" name="model" value="<?php echo $modèle ; ?>" required>
  </div>
  <div class="form-group">
    <label for="annee">annee</label>
    <input type="number" min="2000" max="2024" name="annee"  value="<?php echo $année ; ?>" required >
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

