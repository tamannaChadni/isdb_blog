<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
				<?php
				if (isset($_GET['id'])) {
					$delid = $_GET['id'];
					$delquery = "DELETE FROM tbl_category WHERE id ='$delid '";
					$deldata = $db->delete($delquery);
					if ($deldata) {
						echo "<span class ='success'>Category deleted successfully..</span>";
					} else
					{
						echo "<span class ='error'>Category not deleted successfully..</span>";
					}
				}
				
				
				?>




                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM tbl_category ORDER BY id";
						$category = $db->select($query);
						$i = 0;
						if ($category) {
							while ($result = $category->fetch_assoc()) {
								$i++;
							
						
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><a  href="editcat.php?id=<?php echo $result['id'];?>">Edit</a> 
							|| <a onclick="return confirm('Are You Sure to Delete');"href="?id=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
						<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?>

    
