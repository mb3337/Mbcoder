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

<div class="sticky-top">
  <?php include "partials/_header.php";?>
  
</div>




<div class="container my-3">
  <h1 class="py-2">Search result for <em> "<?php echo $_GET['search']?>"</em></h1>

    <?php
       $noresult = true;
        $query = $_GET["search"];
        $sql = " SELECT * FROM threads WHERE MATCH (thread_title, thread_desc ) against ('$query')";
        $result = mysqli_query($conn,$sql);
         while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_id = $row['thread_id'];
        $url = "thread.php?threadid=".$thread_id;
        $noresult = false;
    
         echo '  <div class="result">
    
              <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>

              <p>'.$desc.'</p>
            </div>';
}

if ($noresult) {
  echo '<div class="container py-1">
       <h2>No Results found</h2>
       <p class="lead">Suggestions: <ul>
            <li> Make sure that all words are spelled correctly.</li>
             <li>Try different keywords.</li>
            <li> Try more general keywords.</li></ul>
 "</p>
     </div> ';
}

  ?>

 
</div>





<footer class="fixed-bottom">
  
  <?php include "partials/_footer.php";?>
  
</footer>


    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>