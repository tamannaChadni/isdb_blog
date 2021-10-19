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
    echo "<script> window.location ='index.php';</script>";
} else {
    $deleteid = $_GET['id'];
    $query = "SELECT * FROM tbl_page WHERE id = '$deleteid'";
    $getData = $db->select($query);
    }
    $delquery = "DELETE FROM tbl_page WHERE id = '$deleteid'";
    $delData = $db->delete($delquery);
    if ($delData){
        echo "<script>alert('page deleted successfully!!');</script>";
        echo "<script> window.location ='index.php';</script>";
    }else {
        echo "<script>alert('page not deleted at all!!');</script>";
        echo "<script> window.location ='index.php';</script>";
    }

?>