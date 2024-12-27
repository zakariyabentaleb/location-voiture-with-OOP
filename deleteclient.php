<?php

include_once("./classPhp/Connection.php");
include_once("./classPhp/Crud.php");


if( isset($_GET["id"])){
    $id=$_GET["id"];
    $table = "clientt";
    // $connection = new mysqli("localhost","root","azl,kkk!","societe");
    // $stmt= $connection -> query(" DELETE FROM clientt WHERE id =$id ; ");
    $crud = new Crud("localhost", "root", "azl,kkk!", "societe");
    $crud->delete($id, $table);
   header("location: ./index.php");
} 
?>