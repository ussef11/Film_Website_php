<?php

include("../cnx.php");

$req = '';
if(isset($_REQUEST['id'])){
    $req = $_REQUEST['id'];
}

try{ 
    
    $conx->prepare('delete from film where idFilm ='.$req)->execute();
    $ref = 1;
    header('Location:edituser.php?ref='.$ref);
}catch(Exception $e){
    $ref = 0;
    header('Location:edituser.php?ref='.$ref);

}
?>