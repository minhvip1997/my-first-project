﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helper/format.php';?>
<?php
$pd = new product();
$fm = new Format();
if(isset($_GET['productid']) ){
    $id = $_GET['productid'];
    $delProduct = $pd->delete_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Product Image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pd = new product();
				
				$pdlist = $pd->show_product();
				if($pdlist){
					$i = 0;
					while($result = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $result['price'];?></td>
					<td><img src="uploads/<?php echo $result['image'];?>" width="50"></td>
					<td><?php echo $result['catName'];?></td>
					<td><?php echo $result['brandName'];?></td>
					<td><?php $fm = new Format();
					echo $fm->textShorten($result['product_desc'],20)?></td>
					<td>Internet Explorer 4.0</td>
					<td>
						<?php
						if($result['type'] == 0){
							echo 'Feathered';
						}else{
							echo 'NonFeathered';
						}
						?>
					</td>
					<td class="center"> 4</td>
					<td><a href="productedit.php?productid=<?php echo $result['productId']?>">Edit</a> || <a href="?productid=<?php echo $result['productId']?>">Delete</a></td>
				</tr>
				<?php
			}
			}
				?>
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
