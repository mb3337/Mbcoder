<?php
session_start();


echo '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum">MB-discuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>

       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Top Category
          </a>
          <ul class="dropdown-menu">';
          $sql = "SELECT category_name,category_id FROM `categories` LIMIT 5";
          $result = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_assoc($result)) {
           echo'
            <li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
          

           }
       echo '</ul>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" >Contact</a>
        </li>
      </ul>';
    
      if (isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true) {
        echo'  <p class="text-light my-0  mx-5">Welcome '.$_SESSION['userName'].'</p>
        
           
         <form class="d-flex" role="search" method="get" action="search.php">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
        
             <a href="partials/_logout.php" class="btn  btn-outline-danger mx-2">Logout</a>

        </form>';
      }
else{
     echo'
      <form class="d-flex" role="search" method="get" action="search.php">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
        
      </form>
      <button class="btn  btn-outline-danger mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#signupModal" >Signup</button>';
      }
      
echo'
    </div>
  </div>
</nav>';
 include "partials/_login.php";
 include "partials/_signup.php";


 if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
   echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>success!</strong> You can now Login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
 }

 
?>