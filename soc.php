<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<style>
		
		body{
		padding:0;
		margin: 0;
		display: flex;
		justify-content: center;
		align-items:  center;
		
		height: 100vh;
			}
		ul{
		padding:0;
		margin: 0;
		display: flex;
		}
		ul li{
		list-style: none;
		 margin: 0 5px;
		}
		ul li a{
		display: flex;
		position: relative;
		text-decoration: none;
		justify-content: center;
		align-items: center;
		border-radius: 50%;
		height: 60px;
		width: 60px;
		font-size: 30px;
		color: #000;
		text-decoration: none;
		transition: 0.5s;
		}
		ul li a:before{
		content: '';
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		color: #000;
		border-radius: 50%;
		z-index: -1;
		transform: scale(0);
		transition: 0.5s;
		}
		ul li a:hover:before{
		transform:scale(1);
		}
		ul li:nth-child(1) a:hover:before{
		background: cyan;
		}
		</style>
		<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
	</head>
	<body>
		<ul class="social-icons">
			<li><a href=""><i class="fab fa-facebook-f"></i></a> </li>
			<li><a href=""><i class="fab fa-twitter"></i> </a>  </li>
			<li><a href=""><i class="fab fa-google-plus-g "></i></i></a>  </li>
			<li><a href=""><i class="fab fa-instagram "></i></a>  </li>
		</ul>
	</body>
</html>