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
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
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
          <div class="text-center"> <span class= "align-text-bottom"> All rights Reserved</span></div>
        </div>
      </nav>
    </div>

  </body>