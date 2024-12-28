<?php

include_once("./classPhp/Connection.php");
include_once("./classPhp/Crud.php");


if( isset($_GET["id"])){
    $id=$_GET["id"];
    $table = "contrats";
    // $connection = new mysqli("localhost","root","azl,kkk!","societe");
    // $stmt= $connection -> query(" DELETE FROM contrats WHERE id =$id ; ");
    $crud = new Crud("localhost", "root", "root", "societe");
    $crud->delete($id, $table);
   header("location: ./contrats.php");
} 
?>