<?php include 'lib/Database.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'helpers/Format.php'; ?>


<?php
$db = new Database();
$fm = new Format();
?>



<!DOCTYPE html>
<html>

<head>
	<?php
	if (isset($_GET['id'])) {
		$pagetitle = $_GET['id'];
		$query = "SELECT * FROM tbl_page WHERE id = '$pagetitle'";
			$page = $db->select($query);
			if ($page) :
				while ($result = $page->fetch_assoc()) : ?>
					<title><?= $result['name'];?>-<?= TITLE;?></title>
	<?php
	endwhile; 
	endif; 
	}
	else{ ?>
		<title><?= $fm->title();?>-<?= TITLE;?></title>
	<?php }?>

	
	<meta name="language" content="English">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<?php include 'scripts/css.php';?>
	<?php include 'scripts/js.php';?>
	<script>
    $(function () {
        $('ul li a').filter(function () {
            return this.href === location.href;
        }).addClass('active');
    });
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php
		">
			<?php
			$query = "SELECT * FROM title_slogan WHERE id ='1'";
			$blog_title = $db->select($query);
			if ($blog_title) {
				while ($result = $blog_title->fetch_assoc()) {

			?>
					<div class="logo">
						<img src="admin/<?= $result['logo']; ?>" alt="Logo" />
						<h2><?= $result['title']; ?></h2>
						<p><?= $result['slogan']; ?></p>
				<?php }
			} ?>
					</div>
		</a>
		<div class="social clear">
			<!-- <div class="icon clear">
				<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div> -->
			<div class="searchbtn clear">
				<form action="search.php" method="get">
					<input type="text" name="search" placeholder="Search keyword..." />
					<input type="submit" name="submit" value="Search" />
				</form>
			</div>
		</div>
	</div>
	<div class="navsection templete">
		
		<ul>	
			<li ><a class="<? $page== 'home'? 'active': ''?>" href="index.php">Home</a></li>
			<?php
			$query = "SELECT * FROM tbl_page";
			$page = $db->select($query);
			if ($page) :
				while ($result = $page->fetch_assoc()) :
			?>
					<li>
					<a class="<? $page== 'page'? 'active': ''?>" href="page.php?id=<?= $result['id']; ?>"><?= $result['name']; ?></a> </li>
				<?php endwhile; ?>
			<?php endif; ?>

			<li><a class="<? $page== 'about'? 'active': ''?>" href="about.php">About us</a></li>
			<li><a class="<? $page== 'contact'? 'active': ''?>"href="contact.php">Contact</a></li>
			
			
		</ul>
	</div>