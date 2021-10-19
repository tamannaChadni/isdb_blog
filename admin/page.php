<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<style>
    .del a{
    /* border: 1px solid; */
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 4px 10px;
    font-weight: normal;
    background :#f0f0f0;

    }
</style>
<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script> window.location ='index.php';</script>";
    // header("Location: catlist.php");
} else {
    $id = $_GET['id'];
}
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Page</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);



            if ($name == "" || $body == "") {
                echo "<span class ='error'>Field must not be empty..</span>";
            } else {


                $query = "UPDATE tbl_page
                                    SET
                                    name = '$name',
                                    body = '$body'
                                    WHERE id = '$id'";
                $update_row = $db->update($query);
                if ($update_row) {
                    echo "<span class='success'>Page Updated Successfully.
                        </span>";
                } else {
                    echo "<span class='error'>Page Not Updated !</span>";
                }
            }
        }
        ?>
        <div class="block">
            <?php
            $query = "SELECT * FROM tbl_page WHERE id = '$id'";
            $page = $db->select($query);
            if ($page) :
                while ($result = $page->fetch_assoc()) :
            ?>

                    <form action="" method="post">
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" name="name" value="<?= $result['name']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Content</label>
                                </td>
                                <td>
                                    <textarea class="tinymce" name="body">
                                     <?= $result['body']; ?></textarea>

                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="update" />
                                    <span class= "del"><a  onclick="  return confirm('Are you sure you want to delete this');"href="delpage.php?id=<?= $result ['id']; ?>">Delete</a></span>
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>


<?php include 'inc/footer.php'; ?>