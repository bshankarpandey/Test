<?php
	require_once('config.php');

	require_once('checklogin.php');
	require_once 'header.php';
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    $query = "SELECT `product`.`product_name`,`product_category`.`category_name`,`product_details`.`id`,`product_details`.`quantity`,`product_details`.`price`,`product_details`.`product_image`,`product_details`.`product_des`,`product_details`.`status` FROM `product`, `product_category`, `product_details` WHERE `product`.`id`=`product_details`.`product_id` AND `product_details`.`category_id`=`product_category`.`id`";
        $result=mysqli_query($conn,$query);
        $data_result = array();

        while($row = mysqli_fetch_array($result)) {
            $data = array();
        	$data['id']            = $row['id'];
        	$data['product_name']  = $row['product_name'];
        	$data['category_name'] = $row['category_name'];
        	$data['product_des']   = $row['product_des'];
        	$data['price']         = $row['price'];
        	$data['quantity']      = $row['quantity'];
        	$data['product_image'] = $row['product_image'];
        	$data['status']        = $row['status'];
            
        	array_push($data_result, $data);
        }

         // var_dump($data_result);exit();
?>
<div id="page">
	<div style="height: 30px; float: right; margin-top: 30px; ">
		<input name="submit" type="submit" class="button" value="logout" onclick="window.
		location.href='logout.php'">
	</div>
	<div id="header">
		<h1> Products</h1>
	</div>
	<div style="height: 30px;  margin-left:10px margin-top: 0px;">
		<input name="submit" type="submit" class="button" value="Add Products" onclick="window.location.href='addproduct.php'">
	</div>
   	<div id="content">
	    <p id="status"></p>		       
	    <legend>Product Details</legend>
	    <?php if (!empty($data_result)) { ?>
		<table border="1" align="center">						
		   	<tr>
		      <th align="center">Sl.no</th>
		      <th align="center">Product Category</th>   
		      <th align="center">Product Name</th>
		      <th align="center">Price</th>
		      <th align="center">Quantity</th>
		      <th align="center">Product Image</th>
		      <th align="center">Product Description</th>
		      <th align="center">Status</th>
		      <th align="center">Action</th>
		    </tr>
		    <?php 
		    	for ($i=0; $i < count($data_result); $i++) { 
		    ?>
		    <tr>
				<td align="center"><?php echo $i+1; ?></td>
				<td align="center"><?php echo $data_result[$i]['category_name']; ?></td>
				<td align="center"><?php echo $data_result[$i]['product_name']; ?></td>
				<td align="center"><?php echo $data_result[$i]['price']; ?></td>
				<td align="center"><?php echo $data_result[$i]['quantity']; ?></td>
				<td align="center"><img height="100" src="pictures/<?php echo $data_result[$i]['product_image']; ?>"></td>
				<td align="center"><?php echo $data_result[$i]['product_des']; ?></td>
				

				<td align="center"><?php echo $data_result[$i]['status']; ?></td>
				<td>
		         	<a href="edit.php?id=<?php echo $data_result[$i]['id']; ?>">Edit</a>
		        	<a href="jasavcript:void(0);" onclick="delete_data(<?php echo $data_result[$i]['id']; ?>)">Delete</a>
		        	<?php if ($data_result[$i]['status'] == 'active') { ?> 
		        		<a href="status_change.php?id=<?php echo $data_result[$i]['id']; ?>&status=deactive">Deactive</a>
		        	<?php } else { ?>
		        		<a href="status_change.php?id=<?php echo $data_result[$i]['id']; ?>&status=active">Active</a>
		        	<?php } ?>
		        </td>
		    </tr>					    
		    <?php
		    	}
		    ?>
		</table>
		<?php  } else {
		    		echo 'No Data Found';
		    	} ?>			
		<div class="clear"></div>
	</div>
</div>
<script type="text/javascript">
	function delete_data(id) {
		var alert = confirm('Are You sure ?')
		if (alert) {
			window.location.href="delete.php?id="+id;
		}
	}
</script>
<?php
require_once('footer.php');
?>
