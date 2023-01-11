

<?php 

include("../cnx.php");
try{
    $insertprogramme = $conx->prepare("insert into programme(idFilm,heure_debut,num_salle) values ?,?,?");
    if(isset($_POST["films"]) && isset($_POST["heure_debut"])  && isset($_POST["num_salle"])){
    $insertprogramme->execute([$_POST["films"],$_POST["heure_debut"],$_POST["num_salle"]]);
     $secc = 1;
    header("Location:index.php?ref=$secc");
    }else{
        $err = 0;
        header("Location:index.php?ref=$err");
    }
   



}catch(Exception $e){
    $err = 0;
    header("Location:index.php?ref=$err");
}
 
  

  
  ?>