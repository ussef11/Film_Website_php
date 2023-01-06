<!DOCTYPE html>
<html lang="en">
<?php 
  session_start();
  if(isset($_SESSION['user'])){header("loaction:index_login.php");}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
   <link rel="shortcut icon" href="ressource/artl-first-A.png" type="image/x-icon">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
   <link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- Favicons -->
   <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
   <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
   <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
   <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
   <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
   <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
   <meta name="theme-color" content="#7952b3">
   <link rel="shortcut icon" href="ressource/artl-first-A.png" type="image/x-icon">
  <title>Movies tickets</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <?php
   
    if(isset($_SESSION['user'])){ include("header_login.php");}
  
      else{include("header.php");}
  ?>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Movies tickets</p>

            <h1 class="h1 hero-title">
              Unlimited <strong>Movie</strong>.
            </h1>

            
             

            <button class="btn btn-primary">
              <ion-icon name="play"></ion-icon>

              <span>Watch now</span>
            </button>

          </div>

        </div>
      </section>





<!-- 
  - #UPCOMING
-->
<?php
 
  include("cnx.php");

?>

<section class="upcoming">
  <div class="container">

    <div class="flex-wrapper">

      <div class="title-wrapper">
        <p class="section-subtitle">Movies</p>

        <h2 class="h2 section-title">This year Movies</h2>
      </div>
      <form action="#" method="Post">
      <ul class="filter-list">


        <li>
          <button name="anime" class="filter-btn">Anime</button>
        </li>
        <li>
          <button name="adventure" class="filter-btn">Adventure</button>
        </li>
        <li>
          <button type="submet" name="action" class="filter-btn">Action</button>
        </li>
        <li>
          <button name="comidy" class="filter-btn">Comedy</button>
        </li>
        <li>
          <button  name="drama" class="filter-btn">Drama</button>
        </li>
        <li>
          <button name="thriller" class="filter-btn">Thriller</button>
        </li>
        <li>
          <button name="sci-fi" class="filter-btn">Sci-Fi</button>
        </li>
        <li>
          <button name="All" class="filter-btn">All</button>
        </li>

      </ul>
      </form>
      
     
    </div>
    
    <ul  class="movies-list  has-scrollbar">
    <?php
     if(isset($_POST["action"])){
        $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Action')";
      
       
        
    } 
    elseif(isset($_POST["adventure"])){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Adventre')";}
    elseif(isset($_POST["anime"])){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Anime')";}
    elseif(isset($_POST["comedy"])){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Comedy')";}
    elseif(isset($_POST["drama"])){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Drama')";}
    elseif(isset($_POST["thriller"])){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Thriller')";}
    elseif(isset($_POST["sci-fi"])){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'sci-fi')";}
    elseif(isset($_POST["All"])){ $sql="select * from film where annee >= year(CURRENT_DATE ())";}
    else{$sql="select * from film where annee >= year(CURRENT_DATE ()) ";}
     
      $t=$conx->query($sql);
       while($row=$t->fetch(PDO::FETCH_ASSOC)){
    ?>
    

      <li>
        <div  class="movie-card">

          <a href="./movie-details.php?ref=<?php echo $row["titre"] ?>">
            <figure class="card-banner">
            <?php if($row["photo_600x900"]==null){ ?><img  alt="film_img" ><?php }else{echo '<img  src="data:image;base64,'.base64_encode($row["photo_600x900"]).'"/>'; } ?>
            </figure>
          </a>

          <div class="title-wrapper">
            <a href="./movie-details.php">
              <h3 class="card-title"><?php echo $row["titre"] ?></h3>
            </a>

            <time datetime="2022"><?php echo $row["annee"] ?></time>
          </div>

          <div class="card-meta">
            <div class="badge badge-outline"><?php echo $row["quality"] ?></div>

            <div class="duration">
              <ion-icon name="time-outline"></ion-icon>

              <time datetime="PT137M"><?php echo $row["duré"] ?> min</time>
            </div>

            <div class="rating">
              <ion-icon name="star"></ion-icon>

              <data><?php echo $row["star"] ?></data>
            </div>
          </div>

        </div>
      </li>
      <?php }?>
        
      
     

      

    

  </div>
</section>





      <!-- 
        - #SERVICE
      -->

      <section class="service">
        <div class="container">

          <div class="service-banner">
            <figure>
              <img src="./assets/images/service-banner.jpg" alt="HD 4k resolution! only $3.99">
            </figure>

            <a href="./assets/images/service-banner.jpg" download class="service-btn">
              <span>Download</span>

              <ion-icon name="download-outline"></ion-icon>
            </a>
          </div>

          <div class="service-content">

            <p class="service-subtitle">Our Services</p>

            <h2 class="h2 service-title">Download Your Shows Watch Offline.</h2>

            <p class="service-text">
              Lorem ipsum dolor sit amet, consecetur adipiscing elseddo eiusmod tempor.There are many variations of
              passages of lorem
              Ipsum available, but the majority have suffered alteration in some injected humour.
            </p>

            <ul class="service-list">

              <li>
                <div class="service-card">

                  <div class="card-icon">
                    <ion-icon name="tv"></ion-icon>
                  </div>

                  <div class="card-content">
                    <h3 class="h3 card-title">Enjoy on Your TV.</h3>

                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consecetur adipiscing elit, sed do eiusmod tempor.
                    </p>
                  </div>

                </div>
              </li>

              <li>
                <div class="service-card">

                  <div class="card-icon">
                    <ion-icon name="videocam"></ion-icon>
                  </div>

                  <div class="card-content">
                    <h3 class="h3 card-title">Watch Everywhere.</h3>

                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consecetur adipiscing elit, sed do eiusmod tempor.
                    </p>
                  </div>

                </div>
              </li>

            </ul>

          </div>

        </div>
      </section>





      <!-- 
        - #TOP RATED
      -->

      <section class="top-rated">
        <div class="container">

          <p class="section-subtitle">Online Streaming</p>

          <h2 class="h2 section-title">Top Rated Movies</h2>

          <ul class="filter-list">

            <li>
              <button class="filter-btn">Movies</button>
            </li>

            <li>
              <button class="filter-btn">Animes</button>
            </li>

            <li>
              <button class="filter-btn">Shorts Movies</button>
            </li>

            <li>
              <button class="filter-btn">Cartoons</button>
            </li>

          </ul>

          <ul class="movies-list">
          <?php
            $sql="select * from film order by star Desc";
            $t=$conx->query($sql);
             while($row=$t->fetch(PDO::FETCH_ASSOC)){
          ?>

            <li>
              <div class="movie-card">

              <a href="./movie-details.php?ref=<?php echo $row["titre"] ?>">
                  <figure class="card-banner">
                  <?php if($row["photo_600x900"]==null){ ?><img  alt="film_img" ><?php }else{echo '<img  src="data:image;base64,'.base64_encode($row["photo_600x900"]).'"/>'; } ?>
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./movie-details.php">
                    <h3 class="card-title"><?php echo $row["titre"] ?></h3>
                  </a>

                  <time datetime="2022"><?php echo $row["annee"] ?></time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline"><?php echo $row["quality"] ?></div>

                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT122M"><?php echo $row["duré"] ?> min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data><?php echo $row["star"] ?></data>
                  </div>
                </div>

              </div>
            </li>
            <?php }?>

            
          </ul>

        </div>
      </section>





      <!-- 
        - #Screening in progress
      -->

      <section class="tv-series">
        <div class="container">

          <p class="section-subtitle">MOVIES</p>

          <h2 class="h2 section-title">screening in progress</h2>

          <ul class="movies-list">
          <?php
            $sql="select * from film where est_en_cours_de_projection = 1";
            $t=$conx->query($sql);
             while($row=$t->fetch(PDO::FETCH_ASSOC)){
          ?>

            <li>
              <div class="movie-card">

              <a href="./movie-details.php?ref=<?php echo $row["titre"] ?>">
                  <figure class="card-banner">
                  <?php if($row["photo_600x900"]==null){ ?><img  alt="film_img" ><?php }else{echo '<img  src="data:image;base64,'.base64_encode($row["photo_600x900"]).'"/>'; } ?>
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./movie-details.php">
                    <h3 class="card-title"><?php echo $row["titre"] ?></h3>
                  </a>

                  <time datetime="2022"><?php echo $row["annee"] ?></time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline"><?php echo $row["quality"] ?></div>

                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT47M"><?php echo $row["duré"] ?> min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data><?php echo $row["star"] ?></data>
                  </div>
                </div>

              </div>
            </li>
            <?php }?>
            
          </ul>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="cta">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="cta-title">Trial start first 30 days.</h2>

            <p class="cta-text">
              Enter your email to create or restart your membership.
            </p>
          </div>

          <form action="" class="cta-form">
            <input type="email" name="email" required placeholder="Enter your email" class="email-field">

            <button type="submit" class="cta-form-btn">Get started</button>
          </form>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

 <?php
 include("footer.php");
 ?>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>