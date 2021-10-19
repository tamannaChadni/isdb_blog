<?php include 'inc/header.php';?>

<?php
if (!isset($_GET['id'])|| $_GET['id'] == NULL){
	header( "Location: 404.php"); 

}else{
	$id = $_GET['id'];
}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php
			$query ="select * from tbl_post where id = $id";
			$post = $db->select($query);
			if ($post) {
				while ($result = $post->fetch_assoc()) {
			
			?>
				<h2><?php echo $result['title'];?></h2>
				<h4><?= strip_tags(substr($result['body'],0,100)).'...' ?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				<img src="admin/<?php echo $result['image'];?>"alt="post image"/>
				<?php echo $result['body'];?>
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
						$cat = isset($result ['cat_id']);
						$queryrelate ="select * from tbl_post where cat_id ='$cat'limit 6";
						$relatedpost = $db->select($queryrelate);
						if ($relatedpost) {
							while ($rresult = $relatedpost->fetch_assoc()) {
			
					 ?>
					<a href="post.php?id=<?php echo $rresult['id'];?>">
						<img src="admin/<?php echo $rresult['image']?>" alt="post image"/>
					</a>
					
					<?php } } else { echo "Related post is not found";} ?>
				</div>
				<?php  } } else { header( "Location: 404.php");} ?>				

	</div>

		</div>
		<?php include 'inc/sidebar.php';?>
		<?php include 'inc/footer.php';?>
							<!-- </div> -->