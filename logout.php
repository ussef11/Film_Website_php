<?php
include("cnx.php");
session_start();
unset($_SESSION['user']);
$sql="update nb_session set nb_session=nb_session-1 where id=0";
$t=$conx->query($sql); 
header('location:index.php')

?>