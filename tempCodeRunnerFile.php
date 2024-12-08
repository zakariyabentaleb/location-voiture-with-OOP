<?php
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
            <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="#"><i class="fa-solid fa-car"></i></a></li>
            <li><a href="#"><i class="fa-solid fa-file-contract"></i></a></li>
            
          </ul>
        </nav>
      </aside>
      <main>
        <header>
          <h2>Listes des clients</h2>
          <div class="stats">
            <div><span>140</span> Nombre de contrats</div>
            <div><span>14</span> Nombre de contrat en cours</div>
            <div><span>95</span> Nombre de contrat clôturés</div>
            <div><span>13 872,33 DH</span> Montant Total</div>
          </div>
        </header>
        <section class="filter">
          <button class="filter-button">Filtre</button>
        </section>
        <section class="table-container">
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>N° contrat</th>
                <th>Référence</th>
                <th>Donneur d'ordre</th>
                <th>Compagnie</th>
                <th>Locataire</th>
                <th>Immatriculation</th>
                <th>Modèle</th>
                <th>Catégorie</th>
                <th>Total facture en TTC</th>
                <th>Durée</th>
                <th>Créateur</th>
                <th>Statut</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>04/04/2019</td>
                <td>NC75/2019</td>
                <td>REF 9G16AD</td>
                <td>Martin Legrand</td>
                <td>Compagnie 1</td>
                <td>Locataire 1</td>
                <td>Immatriculation 1</td>
                <td>HYUNDAI i10</td>
                <td>A</td>
                <td>7 540 DH</td>
                <td>4</td>
                <td>USER</td>
                <td><span class="status in-progress">En cours</span></td>
              </tr>
              <tr>
                <td>04/04/2019</td>
                <td>NC74/2019</td>
                <td>REF MG29AB</td>
                <td>Bernard Garnier</td>
                <td>Compagnie 2</td>
                <td>Locataire 2</td>
                <td>Immatriculation 2</td>
                <td>HYUNDAI i30 BVA D</td>
                <td>E</td>
                <td>6 000 DH</td>
                <td>3</td>
                <td>USER</td>
                <td><span class="status in-progress">En cours</span></td>
              </tr>
              <!-- Ajoutez plus de lignes ici -->
            </tbody>
          </table>
        </section>
      </main>
    </div>
  </body>
  </html>
  <?php
  $connection = new mysqli("localhost","root","","societe");
        $stmt= $connection -> prepare(" SELECT * FROM clientt ");
        $stmt->execute();
        
        $rslt= $stmt->get_result();
        while($row=$rslt->fetch_assoc()){
        
              echo $row["nom"];
              echo $row["adress"];
            }
  ?>