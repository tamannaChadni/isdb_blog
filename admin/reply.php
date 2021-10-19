<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script> window.location ='inbox.php';</script>";
    // header("Location: catlist.php");
} else {
    $id = $_GET['id'];
}



?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Message view</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $to = $fm->validation($_POST['toEmail']);
            $from = $fm->validation($_POST['fromEmail']);
            $subject = $fm->validation($_POST['subject']);
            $message = $fm->validation($_POST['message']);
            
            $sendmail = mail($to,$subject,$message,$from,);
            if ($sendmail) {
              echo "<span class='success'>Message sent successfully..</span>";
            }else{
                echo "<span class='error'>Message  not sent!!!!..</span>" ; 
            }
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
                                    <label>To</label>
                                </td>
                                <td>
                                    <input type="text" name="toEmail" readonly value="<?= $result['email']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>From</label>
                                </td>
                                <td>
                                    <input type="text" name="fromEmail" placeholder="please enter Email Address" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Subject</label>
                                </td>
                                <td>
                                    <input type="text" name="subject" placeholder="please enter Subject" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Message</label>
                                </td>
                                <td>
                                    <textarea class="tinymce" name="message">
                            
                            </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Send" />
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