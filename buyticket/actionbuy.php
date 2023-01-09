<?php 

include('../cnx.php');

// INSERT INTO user(email,user,password) VALUES('youssef@gmail.com','youssqqeef','0000')

session_start();

    if(isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["idfilm"])&& isset($_POST["iduser"])){
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $iduser = $_POST["iduser"];
        $idfilm = $_POST["idfilm"];
      
    
        $sql = $conx->prepare('INSERT INTO checkout(idFilm,iduser,phone,email) VALUES(?,?,?,?)');
        $sql->execute(array($idfilm,$iduser,$phone,$email));

        $price = $conx->query("select price from film where idFilm =".$idfilm)->fetch();

        $sold = $conx->query("select sold from user where  user ='{$_SESSION['user']}'")->fetch();

        $newsold = $sold['sold'] - $price['price'];

        $editprice = $conx->prepare("update user set sold =? where id =?");
        $editprice->execute((array($newsold,$iduser)));
      
        header("location:completebuy.php?iduser=$iduser&idfilm=$idfilm");

     
    }else{
        $error = 0;
         header("Location:ticket.php?ref=$error");
    }
       
 






?>

