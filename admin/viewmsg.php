<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script> window.location ='inbox.php';</script>";
} else {
    $id = $_GET['id'];
}
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Message view</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<script> window.location ='inbox.php';</script>";
        } ?>
        <div class="block">
            <form action="" method="post">
                <?php
                $query = "SELECT * FROM tbl_contact WHERE id= '$id'";
                $msg = $db->select($query);
                if ($msg) :
                    while ($result = $msg->fetch_assoc()) :
                ?>
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" readonly value="<?= $result['firstname'] . ' ' . $result['lastname']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email</label>
                                </td>
                                <td>
                                    <input type="text" readonly value="<?= $result['email']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Message</label>
                                </td>
                                <td>
                                    <textarea class="tinymce">
                            <?= strip_tags(substr($result['body'], 0, 100)); ?>
                            </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Date</label>
                                </td>
                                <td>
                                    <input type="text" readonly value="<?= $fm->formatDate($result['date']); ?>" class="medium" />
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="ok" />
                                </td>
                            </tr>
                        </table>
                    <?php endwhile ?>
                <?php endif ?>
            </form>
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