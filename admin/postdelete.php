<?php include '../lib/Database.php';?>
<?php include '../config/config.php';?>
<?php include '../helpers/Format.php';?>
<?php
	$db = new Database();
?>
<?php
include '../lib/Session.php';
Session::checkSession();
?>
<?php
if (!isset($_GET['id']) || $_GET['id'] ==NULL) {
    echo "<script> window.location ='postlist.php';</script>";
} else {
    $deleteid = $_GET['id'];
    $query = "SELECT * FROM tbl_post WHERE id = '$deleteid'";
    $getData = $db->select($query);
    if ($getData){
        while ($delpost = $getData->fetch_assoc()) {
            $dellink = $delpost['image'];
            unlink($dellink);
        }
    }
    $delquery = "DELETE FROM tbl_post WHERE id = '$deleteid'";
    $delData = $db->delete($delquery);
    if ($delData){
        echo "<script>alert('Data deleted successfully!!');</script>";
        echo "<script> window.location ='postlist.php';</script>";
    }else {
        echo "<script>alert('Data not deleted at all!!');</script>";
        echo "<script> window.location ='postlist.php';</script>";
    }
}
?>