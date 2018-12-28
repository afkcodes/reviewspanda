<?php
      ob_start();
        session_start();
        require_once  'connection.php';
        // ---------------------------Signup Starts Here-----------------------------
        if (isset($_POST['uname'],$_POST['name'],$_POST['email'],$_POST['password'],$_POST['mobile']))
        {
            $options = ['cost' => 12,];
            $ins = True;

            $uname = trim($_POST['uname']);
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password =trim($_POST['password']);
            $epassword = base64_encode(password_hash($password, PASSWORD_DEFAULT, $options));  
            $mobile = trim($_POST['mobile']);


            date_default_timezone_set("Asia/Calcutta");
            $time = date("H:i:s");

            if (empty($uname) || empty($name) || empty($email) || empty($epassword) || empty($mobile)) {
                $ins = False;
                $emsg ='All feilds Are necessary';
                echo "<script type='text/javascript'>alert('$emsg');</script>";
                ;

            }
            elseif (strlen($uname)<4){   
                $ins = False;
                $emsg ='Username must be greater than 4 characters.';
                echo "<script type='text/javascript'>alert('$emsg');</script>";
                
            }

                $usql = "SELECT * FROM  users_signup WHERE Username=?";
                $ustmt= $pdo->prepare($usql);
                $ustmt->execute([$uname]);
                $urow_count = $ustmt->rowCount();
                if($urow_count>0){
                    $ins = False;
                    $emsg ='Username already taken.';
                    echo "<script type='text/javascript'>alert('$emsg');</script>";
                }

            elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){   
                $ins = False;;
                $emsg ='Please check your email address.';
                echo "<script type='text/javascript'>alert('$emsg');</script>";
                
            }
                $esql = "SELECT * FROM  users_signup WHERE Email=?";
                $estmt= $pdo->prepare($esql);
                $estmt->execute([$email]);
                $erow_count = $estmt->rowCount();
                if($erow_count>0){
                    $ins = False;
                    $emsg ='This Email already has an account.';
                    echo "<script type='text/javascript'>alert('$emsg');</script>";
                }


                elseif (strlen($mobile)!=10){   
                $ins = False;
                $emsg ='Please check your Mobile Number.';
                echo "<script type='text/javascript'>alert('$emsg');</script>";              

            }

            elseif (strlen($password)<8){   
                $ins = False;
                $emsg ='Password Should be of minimum 8 characters.';
                echo "<script type='text/javascript'>alert('$emsg');</script>";
                

            }
            elseif($ins== True){

            $sql = "INSERT INTO  users_signup (Username, Name, Email, Password, Mobile, Logintime) VALUES (?,?,?,?,?,?)";

            $stmt= $pdo->prepare($sql);
            $stmt->execute([$uname,$name,$email,$epassword,$mobile,$time]);
            header('location: index.php?signup=sucess');
            }

            elseif($ins==False){
                header( 'Location: ' . $_SERVER['PHP_SELF'] );
                exit();
            }

        // ---------------------------Login Starts Here-----------------------------
        }
        elseif (isset($_POST['uname'],$_POST['password'])) {
            $uname = $_POST['uname'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM  users_signup WHERE Username=?";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$uname]);
            $row_count = $stmt->rowCount();
            if ($row_count<1) {
                $emsg ='No user found with user : ' .$uname.'';
                echo "<script type='text/javascript'>alert('$emsg');</script>";
            }
                else {
                    
                    foreach ($stmt as $db_row)
                {
                    if (password_verify($_POST['password'], base64_decode($db_row['Password'])))
                        {
                            $_SESSION['u_uname'] = $db_row['Username'];
                            $_SESSION['u_name'] = $db_row['Name'];

                            // Update Last Login Activity
                            date_default_timezone_set("Asia/Calcutta");
                            $time = date("H:i:s");
                            $stmt = $pdo->prepare("UPDATE users_signup SET Logintime=? WHERE Username=?");
                            $stmt->execute(array($time, $uname));
                            header('location:admin.php?login=sucess');
                            
                        }

                    elseif (!password_verify($_POST['password'], base64_decode($db_row['Password'])))
                        {
                        $emsg ='Invalid Password';
                        echo "<script type='text/javascript'>alert('$emsg');</script>";
                        
                        }

                }


            }


            
           
            
        }

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>ReviewzPanda Admin Login</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="screen" href="/admin/css/adminlogin.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="/resources/ckeditor/ckeditor.js"></script>
		<script src="/js/script.js"></script>
	</head>
	<body>
		<!--------------------------------NAVIGATION BAR STARTS------------------------------------>
		
		<!--------------------------------NAVIGATION BAR ENDS------------------------------------>
		<div class="container content w-50">
			<div class="container login justify-content-center align-items-center  ">
                    <nav>
                        <div class="nav nav-tabs nav-justified"  id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active rounded-0" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Login</a>
                            <a class="nav-item nav-link rounded-0" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Signup</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <!-------- Login Tab------ -->
                            <form action="index.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control rounded-0" name="uname"  aria-describedby="unameHelp" placeholder="Enter Username" required
                                    value="<?php echo isset($_POST["uname"]) ? htmlentities($_POST["uname"]) : ''; ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control rounded-0" name="password" placeholder="Password " required >
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me on this Computer</label>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn login-btn btn-outline-primary ">Login</button>
                                </div>
                            </form>
                        </div>

<!-------------------------------- Signup Tab------------------------------------------------- -->
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="index.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control rounded-0" name="uname"  aria-describedby="unameHelp" placeholder="Enter Username"  
                                    value="<?php echo isset($_POST["uname"]) ? htmlentities($_POST["uname"]) : ''; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control rounded-0" name="name" aria-describedby="NameHelp" placeholder="Enter Name" required 
                                    value="<?php echo isset($_POST["name"]) ? htmlentities($_POST["name"]) : ''; ?>" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control rounded-0" name="email" aria-describedby="emailHelp" placeholder="Enter email" required
                                    value="<?php echo isset($_POST["email"]) ? htmlentities($_POST["email"]) : ''; ?>" readonly >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control rounded-0 " name="password" placeholder="Password" required readonly >
                                    <small id="emailHelp" class="form-text ">Your Credentials are safe with us. </small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputphone">Mobile No.</label>
                                    <input type="number" class="form-control rounded-0 disabled" name="mobile" aria-describedby="NumberHelp" placeholder="Enter Mobile No." required 
                                    value="<?php echo isset($_POST["mobile"]) ? htmlentities($_POST["mobile"]) : ''; ?>" readonly >
                                </div>
                                <div class="text-center">
                                    <!-- <button type="submit" class="btn signup-btn btn-outline-primary">Signup</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
		</div>
		<!-----------------------------------------FOOTER ---------------------------------------->
		<footer >
			<div class=" container text-center">
				<p> Created with Curiosity |&nbsp;&copy; All Rights Reserved</p>
			</div>
		</footer>
		<!------------------------------------Bootsrap JS--------------------------------------->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>