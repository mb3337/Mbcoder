<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>welcome to Mb-Discuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
      .maxw{
        max-width: 916px;
      }
      
   /*   footer{
        position: relative;

      }*/
      
    </style>
  </head>
  <body>
  <?php include "partials/_dbconnect.php";?>
 
  <?php include "partials/_header.php";?>
  

  <?php 
  
  $id = $_GET['catid'];
   $sql = " SELECT * FROM `categories` WHERE category_id=$id";
   $result = mysqli_query($conn,$sql);
   while ($row = mysqli_fetch_assoc($result)) {
     $catname = $row['category_name'];
     $catdesc = $row['category_description'];


    }
  ?>
   
   <?php
      $showalert = false;
     $method = $_SERVER['REQUEST_METHOD'];
     if ($method == 'POST') {
      // Insert thread into database
      $th_title = $_POST['title'];
      $th_desc = $_POST['desc'];
          $th_title = str_replace("<", "&lt", $th_title);
          $th_title = str_replace(">", "&gt", $th_title);

          $th_desc = str_replace("<", "&lt", $th_desc);
          $th_desc = str_replace(">", "&gt", $th_desc);

      $sno = $_POST['sno'];


      $sql = " INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
      $result = mysqli_query($conn,$sql);
      $showalert = true;
      if ($showalert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Success!</strong> Your thread has been added! Please wait for community respond
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> ';
      }




     }



   ?>



<div class="container my-4 ">
      <div class="p-3 bg-body-tertiary ">
        <div class="h-100 p-5 text-dark rounded-3">
          <h2 class="display-5 fw-bold ">Welcome to <?php echo $catname; ?> forums</h2>
          <p class="col-md-11 fs-5 fw-semibold"><?php echo $catdesc; ?>
            <hr class="my4">
          </p>

          <p><abbr class="fw-bold">Note:-</abbr>
            This is peer to peer forum.Participate in online forums as you would in constructive, face-to-face discussions. Postings should continue a conversation and provide avenues for additional continuous dialogue. Do not post “I agree,” or similar, statements. Stay on the topic of the thread – do not stray.
          </p>

          <button class="btn btn-outline-success" type="button">Learn more</button>
        </div>
      </div>
     
    </div>

    <?php

    if (isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
echo'
    <div class="container">
      
<h2 class="py-2">Start a Discussion</h2>
<form action=" ' . $_SERVER["REQUEST_URI"] .' " method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">problem Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
    <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible</div>
    <input type="hidden" name="sno" value="'.$_SESSION["id"].'">
  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Elaborate Your Concern</label>
  <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
</div>

    <button type="submit" class="btn btn-outline-success">Submit</button>
</form>

    </div>';
  }

  else{
    echo '<main class="container">
<h2 class="py-1">Start a Discussion</h2>

  <div class="bg-body-tertiary p-5 rounded mt-2">
    <h3>You are not logged in </h3>
    <p class="lead">Please login to be able to  Start new Discussion</p>

  </div>
</main>';
  }

?>

<div class="container maxw" >
  
  <h2 class="py-2">Browse quastions</h2>

  <?php 
  
  $id = $_GET['catid'];
   $sql = " SELECT * FROM `threads` WHERE thread_cat_id=$id";
   $result = mysqli_query($conn,$sql);
   $noresult = true;
   while ($row = mysqli_fetch_assoc($result)) {
          $noresult = false;
          $id =$row['thread_id'];
         $title = $row['thread_title'];
         $desc = $row['thread_desc'];
         $thread_time = $row['timestamp'];
         $thread_user_id = $row['thread_user_id'];

         $sql2 = "SELECT userName FROM `users` WHERE sno='$thread_user_id'";
       $result2 = mysqli_query($conn,$sql2);
      $row2 = mysqli_fetch_assoc($result2);






  

echo ' <div class="d-flex my-5">
  <div class="flex-shrink-0">
    <img src="images/user.jpeg" width="54px" height="54px" alt="...">
  </div>
  <div class="flex-grow-1 ms-3">
   <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='. $id.' ">'. $title .'</a> </h5>
    '. $desc  .'
  </div>
    <p class="fw-bold my-0">Asked by: '. $row2['userName'].' at'.$thread_time.' </p>

</div> ';

  }
   if ($noresult) {
    echo '<div class="container-fluid bg-body-tertiary mb-5 ">
     <div class="container py-1">
       <h2>No threads found</h2>
       <p class="lead">Be the first person to ask a quastion</p>
     </div> 
   </div>';

   }




  ?>



</div>




<footer class="fixed-bottom">

  <?php include "partials/_footer.php";?>

    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>