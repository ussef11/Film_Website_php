<?php 

include('../cnx.php');
if(isset($_POST["user"]) &&  isset($_POST["pass"])){
    $select = $conx->prepare("select * from admin where user = ?  and password = ?");
    $select->execute(array($_POST["user"],$_POST["pass"]));
    if($select->rowCount() == 0){
    
        $err = false;
        header("Location:loginadmin.php?ref=$err");
    }else{
        session_start();
        $_SESSION['admin'] = "admin";
        header("Location:index.php");
    }
    
}else{
    $err = false;
    header("Location:loginadmin.php?ref=$err");
}

?>