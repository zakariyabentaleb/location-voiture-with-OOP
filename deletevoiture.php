<?php
if( isset($_GET["id"])){
    $id=$_GET["id"];
    $connection = new mysqli("localhost","root","root","societe");
    $stmt= $connection -> query(" DELETE FROM voiture WHERE id =$id ; ");
   header("location: /car.php");
} 
?>