<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_REQUEST["ref"];?></title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

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

<body id="#top">

  <!-- 
    - #HEADER
  -->

  <?php
  
  session_start();
  if(isset($_SESSION['user'])){ include("header_login.php");}

    else{include("header.php");}
  ?>





  <main>
    <article>

      <!-- 
        - #MOVIE DETAIL
      -->
     
      <section class="movie-detail">
        <div class="container">
        <?php
      
        include("cnx.php");

            $sql1="select annee, duré, est_en_cours_de_projection ,idGenre,photo_600x900,quality,resume,star,titre,heure_debut,num_salle from film f,programme p where titre ='{$_REQUEST["ref"]}'and f.idFilm  = p.idFilm
            ";
            $t=$conx->query($sql1);
            $rod=$t->fetch(PDO::FETCH_ASSOC);
            
            
             
          ?>

          <figure class="movie-detail-banner">

          <?php if($rod["photo_600x900"]==null){ ?><img  alt="films" ><?php }else{echo '<img  src="data:image;base64,'.base64_encode($rod["photo_600x900"]).'"/>'; } ?>
            <button class="play-btn" onclick="   window.location = '<?php echo $rod['lien'] ?>' ">
              <ion-icon name="play-circle-outline"></ion-icon>
            </button>

          </figure>

          <div class="movie-detail-content">

          
            <h1 class="h1 detail-title">
               <strong><?php echo  $_REQUEST["ref"]?></strong>
            </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-fill">PG 13</div>

                <div class="badge badge-outline"><?php echo $rod["quality"]?></div>
              </div>

              <div class="ganre-wrapper">
                <a href="#">Comedy,</a>

                
              </div>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2021"><?php echo $rod["annee"] ?></time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT115M"><?php echo $rod["duré"] ?> min</time>
                </div>
                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2021"><strange> the film show in :</strange> <?php echo $rod["heure_debut"] ?></time>
                  <div class="badge badge-fill">Salle: <?php echo $rod["num_salle"] ?></div>
                </div>

              </div>
            

            </div>

            <p class="storyline">
            <?php echo $rod["resume"] ?>
            </p>

            <div class="details-actions">

              <button class="share">
                <ion-icon name="share-social"></ion-icon>

                <span>Share</span>
              </button>

              <div class="title-wrapper">
                <p class="title">Prime Video</p>

                <p class="text">Streaming Channels</p>
              </div>

              <button class="btn btn-primary">
                <ion-icon name="play"></ion-icon>

                <span>Watch Now</span>
              </button>

            </div>

            <a  href="./buyticket/ticket.php?id=<?php echo $_REQUEST["id"]; ?>"
                  class="download-btn">
              <span>Buy cinema ticket</span>

              <ion-icon name="download-outline"></ion-icon>
            </a>

          </div>
          
        </div>
      </section>
      





      <!-- 
        - #screening in progress
      -->

      <section class="tv-series">
        <div class="container">

          <p class="section-subtitle">Movies</p>

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

</body>

</html>