<?php
$url = $_SERVER['REQUEST_URI'];
require_once 'connection.php';
if (isset($_GET['movie_id'])) {
$movname = rawurldecode(($_GET['movie_id']));
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysqli_set_charset($conn,"utf8");
$db_select = mysqli_select_db($conn, $dbname);
$result = mysqli_query( $conn,"SELECT * FROM editorial WHERE movname= '$movname'");
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
    <?php
        $meta = mysqli_query( $conn,"SELECT edtopic, gtags, file_dest FROM editorial WHERE movname= '$movname'");
        while ($etags = mysqli_fetch_array($meta)) {
        echo '<title>'.($etags['edtopic']).'</title>
        <meta name="keywords" content=" '.($etags['gtags']).'" />
        <meta name="description" content=" Movie Reviews, that  analyze movies without any bias and assess them on its overall impact." />
        <meta property="og:url"           content="'.($url).'" />
        <meta property="og:image"         content="https://www.reviewzpanda.in/admin/'.($etags['file_dest']).'" />
        '

    ;}
    ?>
    <meta name="google-site-verification" content="dd2pFGUek6PowgIn4VaRLfOjo5NxfUdfKz-ZD110DEk" />

    <!-------------------------STYLES CSS STARTS---------------------------->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="reviews.css">
    <!------------------------- STYLE CSS ENDS ------------------------->

    <link href="https://fonts.googleapis.com/css?family=Antic|Jura|Khand|Rajdhani" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132749076-1"></script>
    <script>
       if (document.location.hostname == 'localhost') {
            console.log('Reviewzpanda Loves You');
        }else {
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-132749076-1');
          }
    </script>
  </head>
  <!------------------------------------- BODY----------------------------------- -->
    <body>
  <!-----------------------------FACEBOOK SDK STARTS------------------------------->
      <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
<!-------------------------------- FACEBOOK SDK ENDS --------------------------------->
    <div class=" container-fluid ">
      <?php
       
      if($countrows = mysqli_num_rows($result) >= 1){
      
      while ($row = mysqli_fetch_array($result)) {
      echo '<div class="content hero img-fluid" style="background-image: url(admin/' .($row['file_dest']) . ');" data-type="parallax" data-speed="-2">
        <div class="content-overlay"></div>
        <div class="content-details fadeIn-bottom">
          <h3 class="content-title">' .($row['movname']) . '</h3>
          <p class="content-text">
            <span style="border-bottom: 1px solid white; margin:0.8em;">
              Released On : &nbsp; ' .($row['release_d']) . ' &nbsp;
              |&nbsp; Directed By : &nbsp; ' .($row['director']) . '
            </span>
            <br>
            <span style="border-bottom: 1px solid white; margin-top:0.5em;">Cast :&nbsp ' .($row['starcast']) . '</span>
          </p>
        </div>
      </div>
      <div class="body">
        
        <div class="container">
          <div class="text-left">
            <h3><strong> ' .($row['edtopic']) . '</strong> </h3>
            <small>Reviewed By : ' .($row['Updated_by']) . '</small>
          </div>
        </div>
        <div class="container text-justify article">
          '.($row['edarticle']) .'
          <hr style="background-color: white;"/>
          <p>Liked the review? share it with your buddies.</p>
          <div class="fb-share-button" 
              data-href="'.($url).'" 
              data-layout="button_count">
          </div>

        </div>
        
      </div>';
      $hits = $row['hits'];
      $hits+=1;
      // echo $hits;
      mysqli_query($conn,"UPDATE editorial SET hits = $hits WHERE movname = '$movname'");
      }
      }
      else{
      echo '<img class ="bg img-fluid" src="error.jpg" alt="000xxx">';
      }
      ?>
      
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>