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
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user_name = $fm->validation($_POST['user_name']);
			$password = $fm->validation(md5($_POST['password']));

			$user_name = mysqli_real_escape_string($db->link , $user_name);
			$password = mysqli_real_escape_string($db->link , $password);

			$query = "SELECT * FROM tbl_user WHERE user_name = '$user_name' AND password = '$password'";
			$result = $db->select($query);
			if ($result != false) {
				$value = mysqli_fetch_array($result );
				$row = mysqli_num_rows($result);
				if ($row > 0) {
					Session::set("login",true);
					Session::set("user_name",$value['user_name']);
					Session::set("Id",$value['id']);
					header("Location: index.php");
				}else {
					echo "<span style ='color:red; font-weight:bold;'>No result</span>";

				}
			}else {
				echo "<span style ='color:red; font-weight:bold;'>User name & password not found</span>";
			}
		}
		?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="user_name"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forget.php">Forget password</a>
		</div>
		
		<div class="button">
			<a href="#"></a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
