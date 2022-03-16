<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<button type="submit" class="btn btn-default" name="logout" style="float:center;margin-top: 30px" onclick="location.href='<?php echo base_url();?>index.php/Product/Add_Category'">Add Product</button>

<button type="submit" class="btn btn-default" name="logout" style="float:right;margin-top: 30px" onclick="location.href='<?php echo base_url();?>index.php/Users/logout'">logout</button>
<body>
 
  
<div class="container">
  <h2>Products</h2>
  <p></p>            
  <table class="table">
    <thead>
      <tr>
        <th>Slno.</th>
        <th>Category</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Image</th>
        <th>Product Details</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php 

       for($i= 0; $i <count($datas); $i++)
       {	
      	
      	?></tr>
      <td><?php echo $i+1; ?></td>
      <td><?php echo $datas[$i]['cate_name']; ?></td>
      <td><?php echo $datas[$i]['product_name']; ?></td>
      <td><?php echo $datas[$i]['quantity']; ?></td>
      <td><?php echo $datas[$i]['price']; ?></td>
      <td ><img height="100" src =<?php echo base_url("uploads/". $datas[$i]['image']);?> width="80px" height="40px" /></td>
      <td><?php echo $datas[$i]['product_details']; ?></td>
      <td>
        <a href ="" onclick = "delete_pro(<?php echo $datas[$i]['id'];?>) ">Delete</a>|
        <a href="<?php echo base_url();?>index.php/product/edit/<?php echo $datas[$i]['id'];?>">Edit</a>
      </td>
    <?php 
     } ?>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
<script type="text/javascript">
    
    function delete_pro(id){
       var r = confirm("Do you want to delete this?");
        if (r == true){
          window.location = "<?php echo base_url();?>index.php/Product/Delete/" +id;
        }
        else{
          return false;
        }
    }
        
</script>
<!-- <?php echo base_url();?>index.php/product/delete/  -->
