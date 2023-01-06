<?php
if(isset($_SESSION['user'])){
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="signin.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
  
    <title>Login</title>
</head>
<body class="text-center  ">
<main  class="form-signin  " style="margin-left:35%" >
        <div id="div1">
          <form  action="config_login.php" method="post" style="width: 300px; margin-left: 43%;margin-top: 10%;">
          <img class="mb-4" src="assets/images/logo.svg" alt="" width="220" height="100">
            <h1  class="h3 mb-3 fw-normal">Please sign in</h1>
        
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="user" required />
              <label for="floatingInput">User</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" required/>
              <label for="floatingPassword">Password</label>
            </div>
        
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="w-100 btn btn-dark  btn-primary" type="submit" name="submit" >Sign in</button>
            <br/>
           
            <label style="color:red" > <?php if(isset($_REQUEST["ref"])){ if($_REQUEST["ref"]==0){echo "invalid email or password" ?></label>
            <?php }else{echo "invalid email ";}$_REQUEST["ref"]="";}?>
            <p class="mt-5 mb-3 text-muted">© 2022–2026</p>
          </form>
         
        </div>
      </main>
    
</body>
</html>

  
