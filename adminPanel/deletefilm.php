<?php
session_start();

if(!isset($_SESSION['admin'])){
  header("Location:loginadmin.php");
}

include("../cnx.php");

$req = '';
if(isset($_REQUEST['id'])){
    $req = $_REQUEST['id'];
}

try{ 
    
    $conx->prepare('delete from film where idFilm ='.$req)->execute();
    $ref = 1;
    header('Location:index.php?ref='.$ref);
}catch(Exception $e){
    $ref = 0;
    header('Location:index.php?ref='.$ref);

}
?>