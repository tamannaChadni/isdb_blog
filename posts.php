<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<link rel="stylesheet" href="style.css">
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
    <?php
if (!isset($_GET['category'])|| $_GET['category'] == NULL){
	header( "Location: 404.php"); 

}else{
	$id = $_GET['category'];
}
?>
        <?php
		$query = "select * from tbl_post where cat_id=$id";
		$post = $db->select($query);
		if ($post) {
			while ($result = $post->fetch_assoc()) {
		?>

        <div class="samepost clear">
            <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
            <h4><?= strip_tags(substr($result['body'],0,100)).'...' ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
            <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image" /></a>
            <?php echo $fm->textShorten($result['body']); ?>
            <div class="readmore clear">
                <a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
            </div>
        </div>

        <?php } } else { ?>
			<h3>No post available</h3>
		<?php } ?>
        </div>
    <!-- </div> -->
    <?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php'; ?>
    