<?php
$dbhost = 'localhost';
$dbuser = 'ashish';
$dbpass = 'djmaza.com';
$dbname = 'users_data';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysqli_set_charset($conn,"utf8");
$db_select = mysqli_select_db($conn, $dbname);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ReviewsPanda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="styles.css">
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
              <li><a href="#">Dashboard</a><span class="icon"><i class="fa fa-dashboard"></i></span></li>
              <li class="menu-hasdropdown">
                <a href="#">Settings</a><span class="icon"><i class="fa fa-gear"></i></span>
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
          </div>
        </nav>
      </div>
      <div class="new-wrapper container-fluid no-padding">
        <div id="main">
            <div class='wrapper'>
              <div class='item ryze feature'> <a href="http://www.example.com"></a></div>
              <div class='item irelia feature'> <a href="http://www.example.com"></a></div>
              <div class='item jinx feature'></div>
              <div class='item katarina feature'></div>
              <div class='item ziggs feature'></div>
            </div>
            <div class="row">
              <div class="col-md-8">
              <p class="text-justify">

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent diam nunc, mattis id neque ut, laoreet sollicitudin nibh. Proin varius porttitor ante in fermentum. Praesent placerat elementum eros ut auctor. Integer varius commodo laoreet. Phasellus eget ligula ut orci sollicitudin iaculis eu sed nunc. Curabitur erat lorem, interdum nec tellus in, commodo rutrum arcu. Nulla ullamcorper rhoncus orci eget molestie. Mauris eu placerat ex. Nam ut pharetra odio. Curabitur varius orci sed est cursus euismod. Nam interdum diam in mi elementum, vitae egestas ipsum hendrerit.

Vestibulum interdum ligula eu facilisis tempus. Suspendisse ac placerat velit. Sed lacus velit, suscipit in turpis at, tristique interdum enim. Praesent tristique, nisl sit amet gravida sodales, purus dolor vestibulum mi, id tincidunt ipsum tellus nec ex. Nulla elit eros, ultrices nec est sed, lobortis dapibus lectus. Cras nunc quam, porta eget sagittis ac, lobortis ac odio. Nam mattis cursus erat, quis laoreet diam pharetra ac. Phasellus mollis sit amet libero at sollicitudin.

Quisque at luctus justo, a aliquam dolor. Duis placerat sit amet neque id ullamcorper. Sed elementum euismod justo vitae aliquam. Morbi malesuada quam in metus scelerisque, at vulputate nibh rhoncus. Vivamus sit amet massa sapien. Mauris condimentum nulla ut nisl feugiat lobortis. Nullam lobortis ipsum id leo fringilla viverra. Nam in varius urna.

Fusce pharetra volutpat pellentesque. Quisque tincidunt et leo vel accumsan. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin risus metus, porttitor vel dolor in, volutpat suscipit metus. Suspendisse tristique lectus sed tempus imperdiet. Pellentesque est magna, ultricies eget elementum vel, tincidunt eget arcu. Vivamus neque urna, hendrerit et condimentum vitae, egestas eget nisl. Vivamus eget enim quis ante molestie ultricies. Quisque hendrerit, augue eget laoreet feugiat, tortor enim faucibus nibh, non molestie eros lorem ac magna. Vivamus sed lectus id ante blandit varius. Nunc quis aliquet mauris. Phasellus interdum, nulla eu dapibus volutpat, mi odio fringilla elit, ac blandit augue enim vitae diam. Ut posuere diam eu pulvinar varius.

Nullam posuere aliquam justo et lobortis. Curabitur interdum consectetur imperdiet. Maecenas ex urna, pellentesque vel commodo in, dapibus quis risus. Fusce fermentum, nisi in vestibulum malesuada, sapien turpis ornare felis, scelerisque rhoncus dolor nulla sit amet lorem. Nullam pretium massa sed iaculis scelerisque. Fusce laoreet posuere arcu molestie dictum. Quisque fringilla ligula et risus accumsan aliquam. Maecenas quam arcu, fringilla vel nisi sit amet, mollis luctus dolor. Vestibulum justo leo, commodo facilisis porta in, faucibus ut urna. Nulla pretium, arcu et pharetra vehicula, est ipsum sodales eros, id malesuada risus quam in lectus. Donec accumsan odio quis felis venenatis, in iaculis dolor varius. Vivamus elit massa, congue sed lectus sit amet, mattis ornare elit. Phasellus gravida elit eget dui efficitur viverra. Nunc fringilla ligula vel lorem tempus aliquet. </p>
              </div>
              <div class="col-md-4">
                dsadjksdsad
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