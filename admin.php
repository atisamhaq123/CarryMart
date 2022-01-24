<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
session_start();
if (isset($_SESSION['username'])){header("Location: adminHome.php");}
// If form submitted, insert values into the database.
if (isset($_POST['username'])){	
        // removes backslashes	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `admin` WHERE username='$username'
and PASSWORD='$password'";
	$result = mysqli_query($con,$query);
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: adminHome.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='admin.php'>Go back</a></div>";
	}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
</div>
<?php } ?>

</body>
</html>
