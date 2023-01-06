<?php 

include('../cnx.php');

// INSERT INTO user(email,user,password) VALUES('youssef@gmail.com','youssqqeef','0000')
try{
    if(isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmpass"])){
        $username = $_POST["user"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpass = $_POST["confirmpass"];
        
        if($confirmpass != $password ){
            $error = 0;
         header("Location:register.php?ref=$error");
        }

        $sql = $conx->prepare('INSERT INTO user(email,user,password) VALUES(?,?,?)');
        $sql->execute(array($email,$username,$password));
        session_start();
        $_SESSION["user"] = $_POST["user"];
        $sql="update nb_session set nb_session=nb_session+1 where id=0";
              $t=$conx->query($sql); 
        header("location:../index.php");
     
    }else{
        $error = 0;
         header("Location:register.php?ref=$error");
    }
       
 

}catch(Exception $e){

    header("Location:register.php?ref=$e");
}





?>

