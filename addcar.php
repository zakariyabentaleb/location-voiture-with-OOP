<?php

include_once("./classPhp/Connection.php");
include_once("./classPhp/Crud.php");

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
        <h2 class="titre">ADD NEW CAR</h2>
      </header>
      <form class="tarif-form" method="post">
  <div class="form-group">
    <label for="numeromattr">numeromattr</label>
    <input type="text" name="numeromattr" required>
  </div>
  <div class="form-group">
    <label for="marque">marque</label>
    <input type="text" name="marque" required>
  </div>
  <div class="form-group">
    <label for="model">model</label>
    <input type="text" name="model" required>
  </div>
  <div class="form-group">
    <label for="annee">annee</label>
    <input type="number" min="2000" max="2024" name="annee" required >
  </div>
  <div class="form-buttons">
    <button type="reset" class="btn-cancel">Annuler</button>
    <button type="submit" class="btn-save">Enregistrer</button>
  </div>
</form>
      </main>
    </div>
  </body>
  </html>

  <?php

// $connection = new mysqli("localhost","root","azl,kkk!","societe");
$crud = new Crud("localhost", "root", "root", "societe");
if(isset($_POST["numeromattr"],$_POST["marque"],$_POST["model"],$_POST["annee"])){
  $numeromattr= $_POST["numeromattr"];
  $marque = $_POST["marque"];
  $model = $_POST["model"];
  $annee = $_POST["annee"];
  // $stmt= $connection -> prepare("insert into voiture (numeromattr,marque,modèle,année) values (?,?,?,?)");
  // $stmt->execute([ $numeromattr,$marque,$model,$annee]);
  $crud->addCar($numeromattr, $marque, $model, $annee);
  echo "entreee";
}
?>