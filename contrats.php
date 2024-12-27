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
          <h2>Listes des Contrats</h2>
          <div class="stats">
            <div><span>
            <?php
    $connection = new mysqli("localhost","root","azl,kkk!","societe");
    $stmt= $connection -> query(" SELECT count(*) as totalClient FROM contrats ");
    if($stmt){
     $result=$stmt->fetch_assoc();
     echo "".$result["totalClient"];
    }else{
      echo "indefined";
    }
?>

            </span> Nombre de client</div>
            <img src="./images/ana.jpg" alt="">
          </div>
        </header>
        <section class="ajouter">
         <a href="./addcontrats.php"><button class="ajouter-button">Ajouter</button></a>
         <button type="submit" id="print" class="ajouter-button" onclick="printPage()">Print</button>
        </section>
        <section class="table-container">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>nom</th>
                <th>Car_ID</th>
                <th>datedebut</th>
                <th>datefin</th>
                <th>duree</th>
                <th>prix</th>
                <th>Actions</th> 
              </tr>
            </thead>
            <tbody>
              <?php
             
                $connection = new mysqli("localhost","root","azl,kkk!","societe");
                      $stmt= $connection -> query(" SELECT *, contrats.ID as cID FROM contrats INNER JOIN clientt ON clientt.id=contrats.Client_ID INNER JOIN voiture ON contrats.Car_ID=voiture.ID order by  contrats.ID");
                      while($row=$stmt->fetch_assoc()){   
                ?>
              <tr>
                <td><?=$row["cID"]?></td>
                <td><?=$row["nom"]?></td>
                <td><?=$row["marque"]?></td>
                <td><?=$row["datedebut"]?></td>
                <td><?=$row["datefin"]?></td>
                <td><?=$row["duree"]?></td>
                <td><?=$row["prix"]?></td>
                <td>
  
  <a href="./deletecontrats.php?id=<?=$row["cID"]?>" class="btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
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
  <script>
    function printPage() {
        window.print();
    }
 </script>
  </html>
