<?php
if(isset($_SESSION['user'])){
  header("Location:index.php");
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
                  <form action="config_login.php" method="post">
                  <input type="text" name="user" placeholder="Username" required />
                  <input type="password" name="pass" name="" placeholder="Password"  required />
                  <input type="submit" name="" value="Login" />
                  </form>
                  <p class="signup">
                    Don't have an account ?
                    <a href="#" onclick="toggleForm();">Sign Up.</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="user signupBx">
          

              <div class="formBx">
                <div class="form">
                  <div class="userVerify">

                  <?php if(isset($_REQUEST["ref"])){ if($_REQUEST["ref"]==0){echo " <p>Something Wrong Please Try Againe</p>" ;}}?>
       
                  <p id="err"></p>
                  </div>
                  <h2>Create an account</h2>
                  <form method="POST" onsubmit="return handleConfirme()" action="config_register.php">
                  <input required type="text" name="user" placeholder="Username" />
                  <input required type="email" name="email" placeholder="Email Address" />
                  <input required id="pass" type="password"  name="password" placeholder="Create Password" />
                  <input required id="conpass" type="password" name="confirmpass" placeholder="Confirm Password" />
                  <input type="submit" value="Sign Up" />
                  </form>
                  <p class="signup">
                    Already have an account ?
                    <a href="#" onclick="toggleForm();">Sign in.</a>
                  </p>
                </div>
              </div>
              <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
            </div>
          </div>
        </section>
        <script>
          const toggleForm = () => {
    const container = document.querySelector('.container');
    container.classList.toggle('active');
  };

const handleConfirme = ()=>{
    let pass = document.getElementById("pass").value
     let conpass = document.getElementById("conpass").value
     let err = document.getElementById("err")
     if(pass != conpass){
        err.innerHTML = "Password No Valide"
      
        return false;
     }
    return true;
     
}


  
      </script>
    </body>



</html>



