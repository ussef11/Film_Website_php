<!DOCTYPE html>
<html>
<head>
<title>Check-out form</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.1/css/all.css">
 <link rel="stylesheet" href="../assets/css/ticket.css" >
</head>
<body>
    
<?php 

include('../cnx.php');

$idfilm = $_REQUEST['id'];

$films = $conx->query("select * from film where idFilm =".$idfilm)->fetchAll();
session_start();

$user = $conx->query("select id from user where user ='{$_SESSION['user']}'")->fetch();
$sold = $conx->query("select sold from user where  user ='{$_SESSION['user']}'")->fetch();


?>

 
<main class="container">
            <!--check-out section-->
            <section class="checking-form">
                <header>
                    <h1 class="title">checkout</h1>
                </header>
              <form action="actionbuy.php" method="POST">
                    <div class="information">
                        <p class="information--contact">Contact information</p>
                        <div class="form-field">
                            <label for="your_email" class="form-field--title label__title"><small>E-mail</small>
                                <span class="fa fa-envelope"></span>
                                <input type="email" id="your_email" class="form-field--input" name="email" placeholder="Enter your email..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                           <input hidden type="number" name="idfilm" value="<?php echo $_REQUEST['id']  ?>" />
                           <input hidden type="number" name="iduser" value="<?php echo $user["id"] ?>" />
                            </label>
                        </div>
                        
                        <div class="form-field">
                            <label for="phone" class="form-field--title label__title"><small>Phone</small>
                                <span class="fa fa-phone"></span>
                                <input type="tel" id="phone" class="form-field--input" name="phone" placeholder="Enter your phone..."  required>
                            </label>
                        </div>
                    </div>
                   
                   
                    <div>
                        <label>
                            <input type="checkbox" class="form-checkbox" value="information" name="choose"><small class="form-checkbox--legend">save this information for the next time</small>
                        </label>
                    </div>
                    <div class="btn">
                        <button class="checking-form--submit">continue</button>
                    </div>
                    </form>
            </section>
            <!--product purchase section-->
           

               <div id="purchase" class="purchase">

 <?php foreach($films as $ele){ ?>
                <div class="purchase--product">
                    <div class="purchase--product-img">
                      
                        <?php if($ele["photo_600x900"]==null){ ?><img alt="shoes photo" class="shoes" ><?php }else{echo '<img alt="shoes photo" class="shoes"  src="data:image;base64,'.base64_encode($ele["photo_600x900"]).'"/>'; } ?>
                    </div>
                    <div class="purchase--product-price">
                        <div class="details">
                            <p class="product"><?php  echo $ele["titre"] ?></p>
                            <div class="price">
                                <span id="new-price">$<?php  echo $ele["price"] ?></span>
                                <span id="old-price"><small>$<?php  echo $ele["price"] + 50 ?></small></span>
                            </div>
                            <!-- <div class="unit">
                                <span class="decrease unit--sign remove-prod_2">-</span><span class="display_1 unit--sign">1</span><span class="increase unit--sign add-prod_2">+</span>
                            </div> -->
                        </div>
                    </div>



                </div>

                <div class="purchase--total-price">
                    <div class="shipping--price">
                        <span class="purchase--title">Fees</span>
                        <span class="pricing">$1</span>
                    </div>
                    <div class="shipping--price">
                        <span class="purchase--title">Your Balance</span>
                        <span class="pricing">$ <?php echo $sold["sold"]; ?></span>
                    </div>
                    <div class="total--price">
                        <span class="purchase--title">Total</span>
                        <span class="pricing">$<?php  echo $ele["price"] + 1 ?></span>
                    </div>
                </div>


<?php } ?>
             
                      
         
        
            
              

   
               
                    </div>     
        </main>
        <script> 
        
       



            </script>
   







</body>
</html>

    
  
    