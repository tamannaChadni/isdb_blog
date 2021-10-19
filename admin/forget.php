<?php
include '../lib/Session.php';
Session::init();
?>
<?php include '../lib/Database.php';?>
<?php include '../config/config.php';?>
<?php include '../helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Password recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = $fm->validation($_POST['email']);
			$email = mysqli_real_escape_string($db->link , $email);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<span style ='color:red; font-weight:bold;'>Invalid email address</span>";
			}else{
			$query = "SELECT * FROM tbl_user WHERE email = '$email' LIMIT 1";
			$result = $db->select($query);
			if ($result != false) {
				while ($value = $result->fetch_assoc()) {
					$id = $value ['id'];
					$user_name = $value ['user_name'];
				}
				$text = substr($email,0,3);
				$rand = rand(10000,99999);
				$new_password = "$text$rand";
				$password = md5($new_password);
				$update_query = "UPDATE tbl_user
								SET
								password ='$password'
								WHERE id = '$id'";
				$update_row = $db->update($update_query);
				$to = "$email";
				$from = "tasnim001it@gmail.com";
				$headers = "From:$from\n";
				$headers .= "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$subject = "Your Password";
				$message = "Your user-name is ".$user_name." and Password is ".	$new_password." try to login by using this.";

			    $sendmail = mail($to,$subject,$message,$headers);
				if ($sendmail) {
					echo "<span style ='color:green; font-weight:bold;'>Please check Email for using new password !!.</span>";
				} else {
					echo "<span style ='color:red; font-weight:bold;'>Email not send !!</span>";
				}
			}else {
				echo "<span style ='color:red; font-weight:bold;'>Email not exits !!</span>";
			}
		}
		}
		?>
		<form action="" method="post">
			<h1>Password recovey</h1>
			<div>
				<input type="text" placeholder=" Enter valid Email" required="" name="email"/>
			</div>
			
			<div>
				<input type="submit" value="Send email" />
			</div>
		</form>
		<div class="button">
			<a href="login.php">Log in</a>
		</div>
		
		<div class="button">
			<a href="#"></a>
		</div>
	</section>
</div>
</body>
</html>
