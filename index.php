


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>welcome to Mb-Discuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <?php include "partials/_dbconnect.php";?>

  <?php include "partials/_header.php";?>
  


<!-- slider -->
  <div id="carouselExampleIndicators" class="carousel slide ">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/pimg3.3.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/pimg2.2.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/pimg3.2.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container">
<h2 class="text-center my-3 "> Welcome to MB-Discuss - Categories</h2>



<div class="row" my-4>
  <!-- Fatch all the catogaries -->
  <?php
   $sql = "SELECT * FROM `categories`";
   $result = mysqli_query($conn,$sql);
   while ($row = mysqli_fetch_assoc($result)) {

    // echo $row['category_id'] ;
    // echo $row['category_name'] ;

    $id = $row['category_id'];
    $cat = $row['category_name'];
    $desc = $row['category_description'];
    echo '<div class="col-md-4 my-2">


      <div class="card" style="width: 18rem;">
         <img src="https://media.istockphoto.com/id/1500238408/photo/program-code-development-icon-on-a-digital-lcd-display-with-reflection.webp?b=1&s=170667a&w=0&k=20&c=CfaVabgMcwwc-ijzVAxNs_Sz6q3JVPJnlQ-Py-dpuAQ=" class="card-img-top" alt="...">
          <div class="card-body">
         <h5 class="card-title"><a href="threadlist.php?catid='.$id.'"> '.$cat.'</a></h5>
         <p class="card-text">'.substr($desc, 0,90).'...</p>
        <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
       </div>
     </div>

 </div>';
    
   }



  ?>
  




     </div>

</div>





<footer class="fixed-bottom">
  <?php include "partials/_footer.php";?>
  
  
</footer>


    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>