<?php
require_once('config.php');
if (isset($_SESSION['ADMIN_LOGGED']) && ($_SESSION['ADMIN_LOGGED']== "ADMIN")) {
	header("location:index.php");
	exit();
}

if(isset($_POST['submit'])  AND !empty($_POST['submit']) ) {
	// echo 'hiiii';

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password=mysqli_real_escape_string($conn, md5($_POST['password']));
   
   $query = "SELECT `email` ,`password` FROM `login` WHERE `email`= '$email' AND `password`= '$password'";

   $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0){
   	$_SESSION['ADMIN_LOGGED'] = 'ADMIN';
 	$_SESSION['SERVERIP']= $_SERVER['REMOTE_ADDR'];
	header("Location:index.php");
	exit();
  }
  else{
  	?>

  <p style="color: #f00"><?php	echo "Invalid Email or Password"?></p>;
 
 <?php  }
 
}

require_once 'header.php';

?>



<div id="page">
	<div id="header">
		<h1> Admin Login</h1>
	</div>
	<div id="content">
		<p id="status"></p>
		<form action="login.php" method="post" id="login">
			<fieldset>
				<legend>User details</legend>
				<ul>
					<li>
						<label for="email">
							<span class="required">Email address</span>
						</label>
						<input id="email" name="email" class="text required email" type="text">
						<label for="email" class="error">This must be a valid email address</label>
					</li>
					<li>
						<label for="password">
							<span class="required">Password</span>
						</label>
						<input name="password" type="password" class="text required" id="password" minlength="4" maxlength="20">
					</li>
					<li>
						<label class="centered info"><a id="forgotpassword" href="#"></a>
						</label>
					</li>
				</ul>
			</fieldset>
			<fieldset class="submit">
				<input name="submit" type="submit" class="button" value="Login...">
			</fieldset>
			<div class="clear"></div>
		</form>
	</div>
</div>

<?php require_once 'footer.php' ?>
<script>
	$(function() {
		// highlight
		var elements = $("input[type!='submit']");
		elements.focus(function() {
			$(this).parents('li').addClass('highlight');
		});
		elements.blur(function() {
			$(this).parents('li').removeClass('highlight');
		});

		$("#forgotpassword").click(function() {
			$("#password").removeClass("required");
			$("#login").submit();
			$("#password").addClass("required");
			return false;
		});

		$("#login").validate()
	});
	</script>
