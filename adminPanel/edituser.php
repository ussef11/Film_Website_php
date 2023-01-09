<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/admin.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
    
<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location:loginadmin.php");
}






?>


<div class="app-container">
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="app-icon">
       
      </div>
    </div>
    <ul class="sidebar-list">
      <li class="sidebar-list-item">
        <a onclick="handlehome()" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          <span>Home</span>
        </a>
      </li>
      <li id="film" class="sidebar-list-item active">
        <a  onclick="handlefilms('films')" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span>FILMS</span>
        </a>
      </li>
      <li id="user" class="sidebar-list-item">
        <a onclick="handleuser('user')" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
          <span >user</span>
        </a>
      </li>
    
 
    </ul>
    <div class="account-info">
      <div class="account-info-picture">
        <img src="https://images.unsplash.com/photo-1527736947477-2790e28f3443?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTE2fHx3b21hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="Account">
      </div>
      <div class="account-info-name"> <?php echo $_SESSION['admin']; ?></div>
      <button style="cursor: pointer;" onclick="logoutaction()" class="account-info-more">
        <img src="../assets/images/logout.svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"/>
      </button>

    </div>
  </div>
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Films</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      <button onclick="handleclick()" class="app-content-headerButton">Add Product</button>
    </div>
    <div class="app-content-actions">
      <input class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">
    
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
    <div class="products-area-wrapper gridView">
    




<!-- 
      <div id="products-row" class="products-row">
      
      </div> -->
  

      
    </div>
  </div>
</div>

<script src='../assets/js/scriptadmin.js'></script>


<script>

  const handlehome = ()=>{
    window.location.href ="../index.php" ;
  }
  const handleupdate = (id)=>{
    window.location.href =`updatefilm.php?idFilm=${id}` ;
  }
  const logoutaction = ()=>{

    window.location.href ="logoutaction.php" ;
  }




    const handleclick = ()=>{
        window.location.href ="insertfilm.php" ;
    }

    const handledelete =(idfilm)=>{
       if(window.confirm("Really go to delete this ?")){
        $.ajax({
    method: 'POST',
    url: 'function.php',
    dataType :"html",
    data : {option : "delete" ,
      id : idfilm
                    
    },
    success:                
      alert("Film has been deleted")
   
  });
       }
        
    }
    const handledeleteuser =(userid)=>{
       if(window.confirm("Really go to delete this ?")){
        $.ajax({
    method: 'POST',
    url: 'function.php',
    dataType :"html",
    data : {option : "deleteuser" ,
      iduser : userid
                    
    },
    success:                
      alert("User has been deleted")
   
  });
       }
        
    }
    
    const handleuser =(val)=>{

        $.ajax({
    method: 'GET',
    url: 'function.php',
    dataType :"html",
    data : {option : val},
    success: function(data){                    
            $(".products-area-wrapper").html(data); 
    }
  });

  document.querySelector("#user").classList.add("active");
  document.querySelector("#film").classList.remove("active");


    }
    const handlefilms =(val)=>{

    $.ajax({
    method: 'GET',
    url: 'function.php',
    dataType :"html",
    data : {option : val},
    success: function(data){                    
            $(".products-area-wrapper").html(data); 
    }
  });

  document.querySelector("#film").classList.add("active");
  document.querySelector("#user").classList.remove("active");
    }
</script>

</body>
</html>