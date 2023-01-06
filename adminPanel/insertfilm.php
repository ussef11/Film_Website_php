<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>
  <div class="row">
    <div class="col-md-12">
      <div class="r">
        <h1> Add Recipes </h1>


        <!-- INSERT INTO `film` (`idFilm`, `idGenre`, `titre`, `annee`, `duré`, `resume`, `star`, `quality`, `photo_600x900`,
         `est_en_cours_de_projection`, `createdDate`, `lastModifiedDate`) VALUES ('18', '2', 'Memory 2', '2022', '', 
        ' Synopsis : D\'après le film belge La Mémoire du tueur (2003)', '5', '4k', img, '0', '2023-01-04 23:09:34', '2023-01-07 23:09:34'); -->

<form action="">
        <fieldset>
          <label for="name">recipes Number:</label>
          <input type="text" id="name" name="user_name">

          <label for="email">recipes Name :</label>
          <input type="email" id="mail" name="user_email">



          <label>Difficult:</label>

          <input type="radio" id="development" value="interest_development" name="user_interest">
          <label class="light" for="development">Hard</label><br>

          <input type="radio" id="design" value="interest_design" name="user_interest">
          <label class="light" for="design">simple</label><br>

          <input type="radio" id="business" value="interest_business" name="user_interest">
          <label class="light" for="business">Moyenne</label>



        </fieldset>
        <fieldset>

          <label for="bio">Time:</label>
          <input type="number" id="name" name="user_name">


          <label for="bio">Methode:</label>
          <textarea id="bio" name="user_bio"></textarea>






        </fieldset>

        <label for="password">Numero De Theme:</label>
        <input type="number" id="password" name="user_password">

        <input type="submit"  value="insert film"/>
        </form>
      </div>
    </div>
  </div>

</body>

</html>