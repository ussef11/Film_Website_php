<?php
session_start();
if(isset($_SESSION['user']) == "admin"){
  header("Location:edituser.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/auth.css'>

</head>

    <body>
        <section>
          <div class="container">
         
            <div class="user signinBx">
         
              <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
              <div class="formBx">
                <div class="form">
                  <div class="userVerify">

                  <?php if(isset($_REQUEST["ref"])){ if($_REQUEST["ref"]==0){echo " <p>Something Wrong Please Try Againe</p>" ;}}?>  
      
      
                  </div>
                  <h2>Sign In</h2>
                  <form action="action_loginadmin.php" method="post">
                  <input type="text" name="user" placeholder="Username" required />
                  <input type="password" name="pass" name="" placeholder="Password"  required />
                  <input type="submit" name="" value="Login" />
                  </form>
                 
                </div>
              </div>
            </div>
        



  
      </script>
    </body>



</html>



