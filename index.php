  <!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contrats de Location - CODE-PARC</title>
    <link rel="stylesheet" href="/style.css">
  </head>
  <body>
    <div class="container">
      <aside class="sidebar">
        <div class="logo">
          <h1>MYPARC</h1>
        </div>
        <nav>
          <ul>
            <li><a href="/index.php"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="#"><i class="fa-solid fa-car"></i></a></li>
            <li><a href="#"><i class="fa-solid fa-file-contract"></i></a></li> 
          </ul>
        </nav>
      </aside>
      <main>
        <header>
          <h2>Listes des clients</h2>
          <div class="stats">
            <div><span>
            <?php
    $connection = new mysqli("localhost","root","root","societe");
    $stmt= $connection -> query(" SELECT count(*) as totalClient FROM clientt ");
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
         <a href="/addclient.php"><button class="ajouter-button">Ajouter</button></a>
        </section>
        <section class="table-container">
          <table>
            <thead>
              <tr>
                <th>N° client</th>
                <th>Nom Complet</th>
                <th>Numrto de Telephone</th>
                <th>Adress</th>
                <th>Actions</th> 
              </tr>
            </thead>
            <tbody>
              <?php
                $connection = new mysqli("localhost","root","root","societe");
                      $stmt= $connection -> query(" SELECT * FROM clientt ");
                      while($row=$stmt->fetch_assoc()){   
                ?>
              <tr>
                <td><?=$row["numeroclient"]?></td>
                <td><?=$row["nom"]?></td>
                <td><?=$row["numerotelephone"]?></td>
                <td><?=$row["adresse"]?></td>
                <td>
  <a href="/editclient.php?id=<?=$row["numeroclient"]?>" class="btn-edit">
    <i class="fa-solid fa-pen"></i> Modifier
  </a>
  <a href="/deleteclient.php?id=<?=$row["numeroclient"]?>" class="btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
    <i class="fa-solid fa-trash"></i> Supprimer
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
  </html>
