<?php 
  
  if(!isset($_SESSION['user'])){header("loaction:login.php");}
?>
<header  class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="./index.php" class="logo">
        <img src="./assets/images/logo.svg" alt="Filmlane logo">
      </a>

      <div class="header-actions">

        <button class="search-btn">
          <ion-icon name="search-outline"></ion-icon>
        </button>
        <?php include("cnx.php");?>

        <!-- <div class="lang-wrapper">
          <label for="language">
            <ion-icon name="globe-outline"></ion-icon>
          </label>

          <select name="language" id="language">
            <option value="en">EN</option>
            <option value="au">AU</option>
            <option value="ar">AR</option>
            <option value="tu">TU</option>
          </select>
         
             
        </div> -->
        <?php $sql="select sold,user from user where user ='{$_SESSION['user']}'";
          $t=$conx->query($sql); 
          while($rod=$t->fetch(PDO::FETCH_ASSOC)){ ?><spin style="  display: inline;margin-left:10px; "><strong   style="color:white;display: inline;">
           <?php echo $rod["user"];
            ?></strong><br/><strong style="color:white; display: inline;">
            <?php echo $rod["sold"];
             ?> $</strong></spin>
        <?php 
          }
                
                  $sq="select profile_img from user where user ='{$_SESSION['user']}'";
                  $t=$conx->query($sq);
                while($rod=$t->fetch(PDO::FETCH_ASSOC)){
                 ?>
               

        <button ><?php if($rod["profile_img"]==null){ ?>--><img src="ressource/profile-image.png" alt="profile_img" id="im1" ><?php }else{echo '<img class="rounded-circle" style="height:40px;width:40px;" src="data:image;base64,'.base64_encode($rod["profile_img"]).'"/>'; } ?></button>
        <?php
                  }?>
        <button onclick="   window.location = 'logout.php'" class="btn btn-primary">Sign out</button>
                  
      </div>
      

      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">

          <a href="./index.html" class="logo">
            <img src="./assets/images/logo.svg" alt="Filmlane logo">
          </a>

          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li>
            <a href="./index.php" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="#" class="navbar-link">Movie</a>
          </li>

          <li>
            <a href="#" class="navbar-link"> MOVIES IN PROGRESS</a>
          </li>

        

          <li>
            <a href="#" class="navbar-link">Pricing</a>
          </li>

        </ul>

        <ul class="navbar-social-list">

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-pinterest"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

    </div>
  </header>