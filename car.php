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
          <h2>Listes des Voitures</h2>
          <div class="stats">
            <div><span>
            <?php
    // $connection = new mysqli("localhost","root","azl,kkk!","societe");
    // $stmt= $connection -> query(" SELECT count(*) as totalClient1 FROM voiture ");
    $crud = new Crud("localhost", "root", "azl,kkk!", "societe");
    $result = $crud->afficher("SELECT count(*) as totalClient1 FROM voiture");
    if($result){
     $result=$result->fetch_assoc();
     echo "".$result["totalClient1"];
    }else{
      echo "indefined";
    }
?>

            </span> Nombre de client</div>
            <img src="./images/ana.jpg" alt="">
          </div>
        </header>
        <section class="ajouter">
         <a href="./addcar.php"><button class="ajouter-button">Ajouter</button></a>
         <button type="submit" id="print" class="ajouter-button" onclick="printPage()">Print</button>
        </section>
        <section class="table-container">
          <table>
            <thead>
              <tr>
                <th>numeromattr</th>
                <th>marque</th>
                <th>modèle</th>
                <th>année</th>
                <th>Actions</th> 
              </tr>
            </thead>
            <tbody>
              <?php
             
                // $connection = new mysqli("localhost","root","azl,kkk!","societe");
                //       $stmt= $connection -> query(" SELECT * FROM voiture ");
                      $result = $crud->afficher("SELECT * FROM voiture;");
                      while($row=$result->fetch_assoc()){   
                ?>
              <tr>
                <td><?=$row["numeromattr"]?></td>
                <td><?=$row["marque"]?></td>
                <td><?=$row["modèle"]?></td>
                <td><?=$row["année"]?></td>
                <td>
  <a href="./editcar.php?id=<?=$row["ID"]?>" class="btn-edit">
    <i class="fa-solid fa-pen"></i> 
  </a>
  <a href="./deletevoiture.php?id=<?=$row["ID"]?>" class="btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
    <i class="fa-solid fa-trash"></i> 
  </a>
</td>

              </tr>
             <?php
            }
            ?>
            </tbody>
          </table>
        </section>
      </main>
    </div>
  </body>
  
  <script >   
    function printPage() {
    var divToPrint = document.getElementsByClassName("table-container")[0]; 
    var newWin = window.open("");
    newWin.document.write("<html><head><title>Print</title></head><body>");
    newWin.document.write(divToPrint.outerHTML);
    newWin.document.write("</body></html>");
    newWin.document.close();
    newWin.print();
}

</script>
  </html>
