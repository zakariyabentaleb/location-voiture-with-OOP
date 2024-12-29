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

                    <li><a href="./reservation.php"><i class="fa-solid fa-file-contract"></i></a></li>
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
                            $crud = new Crud("localhost", "root", "root", "societe");
                            $result = $crud->afficher("SELECT count(*) as totalClient1 FROM reservations");
                            if ($result) {
                                $result = $result->fetch_assoc();
                                echo "" . $result["totalClient1"];
                            } else {
                                echo "indefined";
                            }
                            ?>

                        </span> Nombre de client</div>
                    <img src="./images/ana.jpg" alt="">
                </div>
            </header>
            <section class="ajouter">
                <a href="./client.php"><button class="ajouter-button">Ajouter</button></a>

            </section>
            <section class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>marque</th>
                            <th>start_date</th>
                            <th>end_date</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // $connection = new mysqli("localhost","root","azl,kkk!","societe");
                        //       $stmt= $connection -> query(" SELECT * FROM voiture ");
                        $result = $crud->afficher("select users.nom,voiture.marque,reservations.* from reservations inner join users on reservations.user_id=users.id 
inner join voiture on reservations.car_id=voiture.ID;");
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?= $row["nom"] ?></td>
                                <td><?= $row["marque"] ?></td>
                                <td><?= $row["start_date"] ?></td>
                                <td><?= $row["end_date"] ?></td>
                                <td><?= $row["status"] ?></td>
                                <td>

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