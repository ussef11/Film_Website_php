<?php 

include('../cnx.php');

//  INSERT INTO `film` (`idGenre`, `titre`, `annee`, `duré`, `resume`, `quality`,
//          `est_en_cours_de_projection`, `createdDate`, `lastModifiedDate`) VALUES ('18', '2', 'Memory 2', '2022', '', 
//         ' Synopsis : D\'après le film belge La Mémoire du tueur (2003)', '5', '4k', img, '0', '2023-01-04 23:09:34', '2023-01-07 23:09:34'); 

try{
    if(isset($_POST["Genre"]) && isset($_POST["titre"]) && isset($_POST["annee"]) && isset($_POST["duré"]) && isset($_POST["resume"]) &&
    isset($_POST["quality"])){
        $Genre = $_POST["Genre"];
        $titre = $_POST["titre"];
        $annee = $_POST["annee"];
        $duré = $_POST["duré"];
        $resume = $_POST["resume"];
        $quality = $_POST["quality"];
        
    

        $sql = $conx->prepare('INSERT INTO `film` (`idGenre`, `titre`, `annee`, `duré`, `resume`, `quality`, `est_en_cours_de_projection`, `createdDate`, `lastModifiedDate`)

        VALUES(?,?,?,?,?,?,0,year(CURRENT_DATE ()) ,year(CURRENT_DATE ()) )');
        $sql->execute(array($Genre,$titre,$annee,,$duré,$resume,$quality));
        header("location:../index.php");
     
    }else{
        $error = 0;
         header("Location:insertfilm.php?ref=$error");
    }
       
 

}catch(Exception $e){

    header("Location:register.php?ref=$e");
}





?>

