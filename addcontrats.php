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
        <h2 class="titre">ADD NEW CONTRATS</h2>
      </header>
      <form class="tarif-form" method="post">
  <div class="form-group">
    <label for="nom">Nom Complet</label>
    <select name="existing_client" id="existing_client">
      <option value="" disabled selected>Choisir un client existant</option>
      <?php
      //  $connection = new mysqli("localhost","root","azl,kkk!","societe");
      // $clients = $connection->query("SELECT id, nom FROM clientt");
      $crud = new Crud("localhost", "root", "root", "societe");
      $client = $crud->afficher("SELECT id, nom FROM clientt;");
       while ($clients = $client->fetch_assoc()) {
           echo "<option value='{$clients['id']}'>{$clients['nom']}</option>";
       }
      ?>
    </select>
  </div> 
   <div class="form-group">
    <label for="nom">voiture</label>
    <select name="existing_voiture" id="existing_voiture">
      <option value="" disabled selected>Choisir une voiture</option>
      <?php
      // $connection = new mysqli("localhost","root","azl,kkk!","societe");
      // $cars = $connection->query("SELECT ID, marque FROM voiture");
      $cars = $crud->afficher("SELECT ID, marque FROM voiture;");
      while ($car = $cars->fetch_assoc()) {
          echo "<option value='{$car['ID']}'>{$car['marque']}</option>";
      }
      ?>
    </select>
  </div> 
  <div class="form-group">
    <label for="date">date debut</label>
    <input type="date" name="datedebut" required >
  </div>
  <div class="form-group">
    <label for="date">date fin</label>
    <input type="date" name="datefin" required >
  </div>
  <div class="form-group">
    <label for="date">duree</label>
    <input type="number" name="duree" required >
  </div>
  <div class="form-group">
    <label for="prix">prix</label>
    <input type="number" name="prix" required >
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
  <?php
  // $connection = new mysqli("localhost","root","azl,kkk!","societe");
if(isset($_POST["datedebut"],$_POST["datefin"],$_POST["duree"],$_POST["prix"])){
  $existing_client=$_POST["existing_client"];
  $existing_voiture =$_POST["existing_voiture"];
  $datedebut = $_POST["datedebut"];
  $datefin = $_POST["datefin"];
  $duree = $_POST["duree"];
  $prix = $_POST["prix"];
  // $stmt= $connection -> prepare("insert into contrats (Client_ID,Car_ID,datedebut,datefin,duree,prix) values (?,?,?,?,?,?)");
  // $stmt->execute([$existing_client,$existing_voiture,$datedebut,$datefin,$duree,$prix]);
  $crud->addContrat($existing_client, $existing_voiture, $datedebut, $datefin, $duree, $prix);
}
?>
