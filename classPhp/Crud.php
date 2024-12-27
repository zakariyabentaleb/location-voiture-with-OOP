<?php
include_once("Connection.php");

class Crud extends Connection {
    public function __construct($server, $user, $password, $database) {
        parent::__construct($server, $user, $password, $database);
    }

    public function afficher($query){
        $result = mysqli_query($this->connection,$query);
        // $array = array();
        // while($line = mysqli_fetch_assoc($result)){
        //     $array[] = $line;
        // }
        return $result;
    }

    public function addCar($numeromattr, $marque, $model, $annee){
        $sql_command = "insert into voiture (numeromattr,marque,modèle,année) values ('{$numeromattr}','{$marque}','{$model}',{$annee});";
        mysqli_query($this->connection, $sql_command);
    }

    public function addClient($adresse, $numberphone, $nom){
        $sql_command = "insert into clientt (nom,adresse,numerotelephone) values ('{$nom}','{$adresse}','{$numberphone}');";
        mysqli_query($this->connection, $sql_command);
    }

    public function addContrat($existing_client, $existing_voiture, $datedebut, $datefin, $duree, $prix){
        $sql_command = "insert into contrats (Client_ID,Car_ID,datedebut,datefin,duree,prix) values ({$existing_client},{$existing_voiture},'{$datedebut}','{$datefin}',{$duree},{$prix});";
        mysqli_query($this->connection, $sql_command);
    }

    public function delete($id, $table){
        $sql_command = "DELETE FROM {$table} WHERE id ={$id};";
        mysqli_query($this->connection, $sql_command);
    }

    public function afficherEditCar($id){
        $sql_command = "SELECT marque,modèle,année,numeromattr FROM voiture WHERE id = {$id};";
        $result = mysqli_query($this->connection, $sql_command);
        // $array = mysqli_fetch_assoc($result);
        return $result;
    }

    public function updateEditCar($id, $marque, $modele, $annee, $numeromattr){
        $sql_command = "UPDATE voiture SET marque = '$marque', modèle = '$modele', année = '$annee', numeromattr='$numeromattr' WHERE id = $id";
        mysqli_query($this->connection, $sql_command);
    }

    public function afficherEditClient($id){
        $sql_command = "SELECT nom, adresse, numerotelephone FROM clientt WHERE id = {$id};";
        $result = mysqli_query($this->connection, $sql_command);
        $array = mysqli_fetch_assoc($result);
        return $array;
    }

    public function updateEditClient($id, $nom, $adresse, $numberphone){
        $sql_command = "UPDATE clientt SET nom = '{$nom}', adresse = '{$adresse}', numerotelephone = '{$numberphone}' WHERE id = {$id}";
        mysqli_query($this->connection, $sql_command);
    }

    public function afficherListContrats(){
        $sql_command = "SELECT *, contrats.ID as cID FROM contrats INNER JOIN clientt ON clientt.id=contrats.Client_ID INNER JOIN voiture ON contrats.Car_ID=voiture.ID order by  contrats.ID";
        $result = mysqli_query($this->connection, $sql_command);
        return $result;
    }

}
