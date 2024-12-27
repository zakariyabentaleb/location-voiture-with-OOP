<?php
if( isset($_GET["id"])){
    $id=$_GET["id"];
    $connection = new mysqli("localhost","root","azl,kkk!","societe");
    $stmt= $connection -> query(" DELETE FROM contrats WHERE id =$id ; ");
   header("location: ./contrats.php");
} 
?>