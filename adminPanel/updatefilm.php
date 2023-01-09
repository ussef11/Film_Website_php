<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Film</title>
  <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../assets/css/form.css">

</head>

<body>

<?php 
session_start();
if(isset($_SESSION['admin']) != "admin"){
  header("Location:loginadmin.php");
}


include('../cnx.php');
$data = $conx->query("select idGenre ,libelle from genre")->fetchAll();


?>


  <div class="row">
    <div class="col-md-12">
      <div class="r">
        <h1> Add Film </h1>

        <?php if(isset($_REQUEST["ref"])){ if($_REQUEST["ref"]==1){echo " <p class='seccssufuly'>Film has been Modified</p>" ;}}?>   
        <?php if(isset($_REQUEST["ref"])){ if($_REQUEST["ref"]==0){echo " <p class='err'>Error Please Try Againe</p>" ;}}?>   
      
<form action="insertfilmaction.php"   enctype="multipart/form-data" method="POST">
        <fieldset>
          <label for="name">titre:</label>
          <input type="text" id="name" name="titre">

          <label for="email">annee :</label>
          <input type="number" id="mail" name="annee">

          <label for="email">duré :</label>
          <input type="number" id="mail" name="duré">

          <label for="email">resume :</label>
          <input type="text" id="mail" name="resume">

          <label for="email">quality :</label>
          <input type="text" id="mail" name="quality">



          <label>Genre:</label>
<?php 
foreach($data as $ele){
?>
          <input type="radio" id="development" value="<?php echo $ele["idGenre"]; ?>" name="Genre">
          <label class="light" for="development"><?php echo $ele["libelle"]; ?></label><br>
          <?php 
}
?>
         <input type="radio" id="development" value="1" name="est_en_cours_de_projection">
         <input type="radio" id="development" value="0" name="est_en_cours_de_projection">
          <label class="light" for="development">cours de projection</label><br>



        </fieldset>
       

      
<div style="text-align: center;" class="btsn">  <input class="inpt" type="submit"  value="insert film"/> </div>
      
        </form>
      </div>
    </div>
  </div>

</body>

</html>