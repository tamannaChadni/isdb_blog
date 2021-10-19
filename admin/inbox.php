<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
				<?php
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						$query = "UPDATE tbl_contact
						SET
						status ='1'
						WHERE id ='$id'";
						$update_row = $db->update($query);
						if ($update_row) {
							echo "<span class='success'>Message seen successfully..</span>";
						}else {
							echo "<span class='error'>Message  not seen successfully..</span>";
						}
					}
					
					
					?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = "SELECT * FROM tbl_contact WHERE status ='0' ORDER BY id";
						$msg = $db->select($query);
						$i = 0;
						if ($msg) :
							while ($result = $msg->fetch_assoc()) :
								$i++;
						
						?>
						<tr class="odd gradeX">
							<td><?= $i;?></td>
							<td><?= $result['firstname'] .' '.$result['lastname'];?></td>
							<td><?= $result['email'];?></td>
							<td><?= strip_tags(substr($result['body'],0,100));?></td>
							<td><?= $fm->formatDate($result['date']);?></td>
							<td><a href="viewmsg.php?id=<?= $result['id'];?>">View</a> || 
								<a href="reply.php?id=<?= $result['id'];?>">Reply</a> ||
								<a onclick="return confirm('r u sure to move the message!!');" href="?id=<?= $result['id'];?>">Seen</a> ||
							</td>
						</tr>
						<?php endwhile?>
						<?php endif?>
						
					</tbody>
				</table>
               </div>
            </div>
			<!-- 2nd part -->

			<div class="box round first grid">
                <h2>Seen Message</h2>
				<?php
				if (isset($_GET['delid'])) {
					$delid = $_GET['delid'];
					$delquery = "DELETE FROM tbl_contact WHERE id ='$delid '";
					$deldata = $db->delete($delquery);
					if ($deldata) {
						echo "<span class ='success'>Message deleted successfully..</span>";
					} else
					{
						echo "<span class ='error'>Message not deleted successfully..</span>";
					}
				}
				
				
				?>
                <div class="block">      
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = "SELECT * FROM tbl_contact WHERE status ='1' ORDER BY id";
						$msg = $db->select($query);
						$i = 0;
						if ($msg) :
							while ($result = $msg->fetch_assoc()) :
								$i++;
						
						?>
						<tr class="odd gradeX">
							<td><?= $i;?></td>
							<td><?= $result['firstname'] .' '.$result['lastname'];?></td>
							<td><?= $result['email'];?></td>
							<td><?= strip_tags(substr($result['body'],0,100));?></td>
							<td><?= $fm->formatDate($result['date']);?></td>
							<td>
								<a onclick="return confirm('r u sure to delete the message!!');" href="?delid=<?= $result['id'];?>">Delete</a>
							</td>
						</tr>
						<?php endwhile?>
						<?php endif?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
        <?php include 'inc/footer.php';?>
