<?php

session_start();
if(!isset($_SESSION['admin'])){
  header("Location:loginadmin.php");
}

// $films = $conx->query("SELECT * FROM film f INNER JOIN genre g on f.idGenre = g.idGenre ")->fetchAll();

function fetchdatafilm(){
    include('../cnx.php');
    $films = $conx->query("SELECT * FROM film f INNER JOIN genre g on f.idGenre = g.idGenre ")->fetchAll();
    return $films;
}
function fetchdatauser(){
    include('../cnx.php');
    $user = $conx->query("SELECT * FROM user")->fetchAll();
    return $user;
}

function deletefilm($id){
  include("../cnx.php");

 $conx->prepare('delete from film where idFilm ='.$id)->execute();
      
  
}
function deleteuser($id){
  include("../cnx.php");
 $conx->prepare('delete from user where id ='.$id)->execute();
 
}

// Full texts	idProgramme	idFilm	heure_debut	num_salle	createdDate	lastModifiedDate 



$fetchdatafilm = fetchdatafilm();
$fetchdatauser = fetchdatauser();

if($_GET['option'] == 'films')
{
    showdatafilm($fetchdatafilm);
} elseif($_GET['option'] == 'user'){
    showdatauser($fetchdatauser);
}elseif($_POST['option'] == 'delete'){
  deletefilm($_POST['id']);
}elseif($_POST['option'] == 'deleteuser'){
  deleteuser($_POST['iduser']);
}
// elseif($_POST["option"] == 'programme'){
//   addprgam();
  
// }

function showdatafilm($data){
 foreach($data as $ele) { 

     echo  ' <div class="products-row">';
      echo '  <button class="cell-more-button">';
      echo '    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">';

       if($ele["photo_600x900"]==null){ echo  ' <img  alt="film_img" >';}else{echo '<img  src="data:image;base64,'.base64_encode($ele["photo_600x900"]).'"/>'; } 
          echo ' <span>'
         . $ele["titre"]  .
            '</span>

          </div> ';

    echo '    <div class="product-cell category"><span class="cell-label">titre:</span>' .  $ele["titre"]  .'</div>';
    echo '  <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>' ;
         
       echo '<span' ;
        if($ele["est_en_cours_de_projection"] == 1){ echo "class='status active'";}else{ echo "class='status disabled'";} 
        echo  '> Active</span>
        
        </div>
        <div class="product-cell sales"><span class="cell-label">start:</span>'. 
         $ele["star"].  '</div>
        <div class="product-cell stock"><span class="cell-label">Quality:</span>' .  $ele["quality"]  . '</div>
        <div class="product-cell price"><span class="cell-label">Categorie:</span>' .$ele["libelle"] . '</div>

        <div class="product-cell price">
       <div> <button onclick="handledelete('. $ele['idFilm'] . ')" class="btnaction">Delete</button></div>
       <div> <button  onclick="handleupdate(' .  $ele['idFilm'] .')" class="btnaction">Update</button></div>
        </div>

      </div>';
 }

}







function showdatauser($data){
 foreach($data as $ele) { 

     echo  ' <div class="products-row">';
      echo '  <button class="cell-more-button">';
      echo '    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">';

       if($ele["profile_img"]==null){ echo  ' <img  alt="film_img" >';}else{echo '<img  src="data:image;base64,'.base64_encode($ele["profile_img"]).'"/>'; } 
          echo ' <span>'
         . $ele["user"]  .
            '</span>

          </div> ';

    echo '    <div style="display: grid;" class="product-cell category"><span class="cell-label">email:</span>' .  $ele["email"]  .'</div>';
    echo '  <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>' ;
         
       echo '<span' ;
        if($ele["active"] == 1){ echo "class='status active'";}else{ echo "class='status disabled'";} 
        echo  '> Active</span>
        
        </div>
        <div class="product-cell sales"><span class="cell-label">sold:</span>'. 
         $ele["sold"].  '</div>
        <div class="product-cell stock"><span class="cell-label">first name:</span>' .  $ele["first_name"]  . '</div>
        <div class="product-cell price"><span class="cell-label">last name:</span>' .$ele["last_name"] . '</div>
   

        <div class="product-cell price">
       <div> <button onclick="handledeleteuser( ' . $ele['id'] . ')" class="btnaction">Delete</button></div>
   
        </div>

      </div>';
 }

}



?>