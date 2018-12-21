<?php 
  require_once 'connection.php';
  if (isset($_GET['article_id'])) {
    $article_id = base64_decode($_GET['article_id']);


    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysqli_set_charset($conn,"utf8");
    $db_select = mysqli_select_db($conn, $dbname);
    $result = mysqli_query( $conn,"SELECT * FROM editorial WHERE article_id = $article_id ");
}

else{
    echo 'Error Occoured Try Again Later !';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ReviewsPanda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="reviews.css">
    <link href="https://fonts.googleapis.com/css?family=Antic|Jura|Khand|Rajdhani" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
  </head>
  <body>
    <div class=" container-fluid ">


      <?php 
              if($countrows = mysqli_num_rows($result) >= 1){
   
                while ($row = mysqli_fetch_array($result)) {
               echo '<div class="hero" style="background-image: url(/../admin/' .($row['2']) . ');" data-type="parallax" data-speed="-2"></div>
                        <div class="body">
                          <div class="container">' .($row['edarticle']) . '</div>
                      </div>';
                        $hits = $row[6];
                        $hits+=1;
                  // echo $hits;
                      mysqli_query($conn,"UPDATE editorial SET hits = $hits WHERE article_id = $article_id");
                       }

                  }
                  else{
                      echo '<img class ="bg" src="error.jpg" alt="000xxx">';
                  }
                  ?>     



      
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>