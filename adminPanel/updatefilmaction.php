<?php 

session_start();
if(isset($_SESSION['admin']) != "admin"){
  header("Location:loginadmin.php");
}

include('../cnx.php');

try{
    if(isset($_POST["Genre"]) && isset($_POST["titre"]) && isset($_POST["annee"]) && isset($_POST["duré"]) && isset($_POST["resume"]) &&
    isset($_POST["quality"])){
        $Genre = $_POST["Genre"];
        $titre = $_POST["titre"];
        $annee = $_POST["annee"];
        $duré = $_POST["duré"];
        $resume = $_POST["resume"];
        $quality = $_POST["quality"];
        $est_en_cours_de_projection = $_POST["est_en_cours_de_projection"];
       

        $sql = $conx->prepare('update film set idGenre = ?, titre = ?, annee = ?, duré = ?, resume = ?, quality = ?, est_en_cours_de_projection = ? 
         where idFilm ='.$_REQUEST["idFilm"]);
        $sql->execute([$Genre,$titre,$annee,$duré,$resume,$quality,$est_en_cours_de_projection]);
    
        $secc = 1;
        header("Location:insertfilm.php?ref=$secc");
     
    }else{
        $error = 0;
         header("Location:insertfilm.php?ref=$error");
    }
       
 

}catch(Exception $e){

    header("Location:insertfilm.php?ref=$e");
}





?>

