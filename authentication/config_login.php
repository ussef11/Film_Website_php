<?php
include("../cnx.php");
$email=$_POST["user"];
$pass=$_POST["pass"];
$sql=$conx->prepare("select * from user where user = ? and password = ?");
$sql->execute(array($email,$pass));
 if($sql->rowCount()==0){
   
    $error="0";
    
    header("location:register.php?ref=$error");
    
 }
 else{
   
   session_start();
    $_SESSION["user"] = $_POST["user"];
    $sql="update nb_session set nb_session=nb_session+1 where id=0";
          $t=$conx->query($sql); 
   header("location:../index.php");
  
}
?>