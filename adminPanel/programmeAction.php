<?php 


function addprogramme($idFilm,$heure_debut,$num_salle){
    include("../cnx.php");
    try{
      $insertprogramme = $conx->prepare('insert into programme(idFilm,heure_debut,num_salle) values ?,?,?');
      $insertprogramme->execute([$idFilm,$heure_debut,$num_salle]);
      return "Programme Has bee added";
    }catch(Exception $e){
      return $e->getMessage();
    }
  
  }

  if($_POST['option'] == "programme"){
    addprgam();
  }



function addprgam(){

 echo '  <div class="addpro">
 <div class="titl">
   <h1 >Add Programme</h1>
 </div>
<form action="programme.php" method="POST">
 <div class="inputs">
   
 <div class="inp">
   <label class="lblfilm" for="idfilm">Choose film</label>
   <select class="input" name="films">'

   
 . 
 include("../cnx.php");
 $film = $conx->query("SELECT * FROM film")->fetchAll();
 foreach($film as $ele){
   echo '<option value="'.$ele["idFilm"].'">' . $ele["titre"] . '</option>' ;
 } ;
 
  
 
 echo ' </select>
 </div>
 <div class="inp">
   <label class="lblfilm" for="heure_debut">heure debut</label>
  <input class="input" type="text" name="heure_debut" />
 </div>
 <div class="inp">
   <label style="margin-right: 168px;" class="lblfilm" for="num_salle">num salle</label>
   <input class="input" type="text" name="num_salle" />
 </div>

 <input type="submit" class="submit" value="Add Programme" />


 </div>
 </form>
</div> ' 






;

}


?>