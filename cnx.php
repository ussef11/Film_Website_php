<?php
$srvr="localhost";
$dbname="video_library";
$login="root";
$pw="";
try{
$conx=new PDO("mysql:host=$srvr;dbname=$dbname",$login,$pw);

}
catch(PDOException $e){$e->getMessage();die();}


?>