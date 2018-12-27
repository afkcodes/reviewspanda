<?php
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ReviewsPanda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Antic|Jura|Khand|Rajdhani" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
  </head>
  <body>
    <div class="primary-nav">
      <button href="#" class="hamburger open-panel nav-toggle">
      <span class="screen-reader-text">Menu</span>
      </button>
      <nav role="navigation" class="menu">
        <a href="#" class="logotype">LOGO<span>TYPE</span></a>
        <div class="overflow-container">
          <ul class="menu-dropdown">
            <li><a href="#">Dashboard</a><span class="icon"><i class="fas fa-tachometer-alt"></i></span></li>
            <li class="menu-hasdropdown">
              <a href="#">Settings</a><span class="icon"><i class="fas fa-cog"></i></span>
              <label title="toggle menu" for="settings">
                <span class="downarrow"><i class="fa fa-caret-down"></i></span>
              </label>
              <input type="checkbox" class="sub-menu-checkbox" id="settings" />
              <ul class="sub-menu-dropdown">
                <li><a href="">Profile</a></li>
                <li><a href="">Security</a></li>
                <li><a href="">Account</a></li>
              </ul>
            </li>
            <li><a href="#">Favourites</a><span class="icon"><i class="fa fa-heart"></i></span></li>
            <li><a href="#">Messages</a><span class="icon"><i class="fa fa-envelope"></i></span></li>
          </ul>
          <div class="fixed-bottom text-center"> <span>All Right Reserved &copy ReviewsPanda </span></div>
        </div>
      </nav>
    </div>
    <div class="new-wrapper container-fluid no-padding">
      <div id="main">
        <div class='wrapper'>
          <?php
          // This is dynamic posters and the link goes
                $popular = mysqli_query($conn,"SELECT * FROM editorial ORDER BY article_id DESC LIMIT 5");
                $cls = ['ryze','irelia','jinx','katarina','ziggs'];
                $i=0;
                while ($i<count($cls) && $row = mysqli_fetch_array($popular)){
               
                  
                    echo '<div class="item '.($cls[$i]).' feature" style="background-image: url(/../admin/' .($row['file_dest']) . ');"> <a href ="reviews.php?article_id='.base64_encode($row['0']).'"> ' .($row['edtopic']) . ' "></a></div>';
                      $i++;

                  }
                  

                
                  ?>
        </div>
        <!-- reviews and data -->
        <div class="row">
          <div class="col-md-7">
            <div class="reviewtag">
              <h5> Recently Reviewed</h5>
            </div>
            <!-- pagefold it -->
            <?php
            if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
            } else {
            $pageno = 1;
            }
            $no_of_records_per_page = 5;
            $offset = ($pageno-1) * $no_of_records_per_page;
            $total_pages_sql = "SELECT COUNT(*) FROM editorial";
            $result = mysqli_query($conn,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);
            $result2 = "SELECT * FROM editorial ORDER BY article_id DESC LIMIT $no_of_records_per_page  OFFSET $offset";
            $resultq = mysqli_query($conn,$result2);
            while ($row = mysqli_fetch_array($resultq)) {
            // upto here
            echo '
            <div class="row reviewbox ">
              <div class="col-md-4 ">
                <img src="/../admin/'.$row["file_dest"].'" class="revimg img-fluid"/>
              </div>
              <div class="col-md-8 content" >
                <div>
                  <a class ="title" href ="reviews.php?movie_id='.urlencode($row['edtopic']).'"> ' .($row['edtopic']) . ' </a>
                </div>
                <div class="author">
                  <small><i class="fas fa-calendar-alt">&nbsp '.($row['updatetime']).'</i> &nbsp by </small>&nbsp
                  <small><i class="fas fa-user-alt"></i>&nbsp '.($row['Updated_by']).'</small> </br>
                </div>
                
                <div id="fos" class="container-fluid no-padding">
                  <p class="text-justify ">'.strip_tags(substr("$row[7]", 0, 500)).'</p>
                </div>
              </div>
            </div>';
            }
            ?>
            <div class="col-12">
              <!-- pagefold it counts -->
              <ul class="pagination">
                <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                  <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                </li>
                <li class="page-item"><a href="?pageno=1" class="page-link" href="#">1</a></li>
                <li class="page-item"><a href="?pageno=2" class="page-link" href="#">2</a></li>
                <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                  <a href="?pageno=3" class="page-link" href="#">3</a>
                </li>
                <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                  <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                </li>
              </ul>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="row">
              
              <div class="col-md-11 sidebar popular">
                <h5> Popular Reviews</h5>
                <?php
                $popular = mysqli_query($conn,"SELECT * FROM editorial ORDER BY hits DESC LIMIT 5");
                while ($row = mysqli_fetch_array($popular)) {
                echo '
                <div class="fullbox">
                  <div class="row popreviews">
                    <div class="col-md-4 col-sm-2">
                      <img src="/../admin/'.$row["file_dest"].'" class="popimg img-fluid"/>
                    </div>
                    <div class="col-md-8 col-sm-10 popdata" >
                       <a class ="title" href ="reviews.php?movie_id='.urlencode($row['edtopic']).'"> ' .($row['edtopic']) . ' </a>
                    </div>
                  </div> </div>';
                  }
                  ?>
                  
                </div>
                
                <div class="col-md-11 sidebar ">
                  <h5> Follow Me On</h5>
                  <button class="icon-btn facebook">
                  <a class="link" href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-facebook-f "></i>
                  </a>
                  <button class="icon-btn instagram">
                  <a class="link" href="https://www.instagram.com/"  target="_blank">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <button class="icon-btn twitter">
                  <a class="link" href="https://twitter.com/" target="_blank">
                    <i class="fab fa-twitter "></i>
                  </a>
                  
                  <button class="icon-btn google-plus">
                  <a class="link" href="https://plus.google.com/" target="_blank">
                    <i class="fab fa-google-plus-g "></i>
                  </a>
                  
                </div>
                
                <div class="col-md-11 sidebar">
                  <h5> Upcoming Releases</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!---------------------------------------------------- Bootstrap Plugins ---------------------------------------->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>