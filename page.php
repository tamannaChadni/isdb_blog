<?php
$page = 'page';
include 'inc/header.php'; ?>
<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    header("Location: 404.php");
    // header("Location: catlist.php");
} else {
    $id = $_GET['id'];
}
?>
<?php
        $query = "SELECT * FROM tbl_page WHERE id = '$id'";
        $page = $db->select($query);
        if ($page) :
            while ($result = $page->fetch_assoc()) :
        ?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        
                <div class="about">

                    <h2><?= $result['name']; ?></h2>
                    <p><?= $result['body']; ?></p>


                
                </div>

    </div>
    <?php endwhile; ?>
            <?php else : header("Location: 404.php"); ?>
            <?php endif; ?>

    <?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php'; ?>