<?php include_once 'resource/session.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style_login.css" type="text/css" media="all" >
<title> HUMAN BEAT || PATIENT LOGIN </title>
</head>
<body>
	<h2> User Authentication System </h2><br>
<div class="login-main">
<h3 ><a href="../index.php">Start A New Session</a></h3>
<h1><?php if(!isset($_SESSION['username'])): ?>
<p align="center" > You are not currently Logged In <a href="../patient_login.php"> Login </a>Not yet a member? <a href="signup.php" >SignUp </a></p>
<?php else: ?>
<p> You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?> <br><a href="logout.php">Logout</a></p>
<?php endif ?></h1>

</div>
</body>
</html>

