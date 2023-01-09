<?php 

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
        $img = file_get_contents($_FILES["photo_600x900"]["tmp_name"]);

        $sql = $conx->prepare('insert INTO film(idGenre, titre, annee, duré, resume, quality, est_en_cours_de_projection,photo_600x900)

        VALUES(?,?,?,?,?,?,?,?)');
        $sql->execute([$Genre,$titre,$annee,$duré,$resume,$quality,0,addslashes($img)]);
    
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

