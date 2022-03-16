<html lang="en">
<head>
  <title>add products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

 <body>
 <div class="container">
 <button type="submit" class="btn btn-default" name="logout" style="float:center;margin-top: 30px" onclick="location.href='<?php echo base_url();?>index.php/Product/ShowProduct'">Home</button>
 <button type="submit" class="btn btn-default" name="logout" style="float: right;margin-top: 30px" onclick="location.href='<?php echo base_url();?>index.php/Users/logout'">logout</button>
  <h2>Add products</h2>
     
  <form method="post"  action="<?php echo base_url();?>index.php/Product/Add_Category" enctype = "multipart/form-data"/>

     <h5 style="color: red"><?php echo validation_errors(); ?></h5> 
    <div class="form-group">
      <label for="category">Select Category </label>
        
      <select class="form-control" id="category" name="category" value ="<?php echo set_value('category');?>"> 
      <option value="">Select Category</option>
    
              <?php foreach($cate_name as  $data){ ?>

          
           <option value="<?php echo $data['id'];?>"><?php echo $data['cate_name'];?></option>   
         <?php 
           }
           
        ?> 
       
        
      </select>
      <br>
      <label for="products">Select Products</label>
      <select class="form-control" id="product" name="product">
        <option value="">Select Products</option>
       
       
      </select>
    <div class="form-group">
      <label for="productquantity">Productquantity</label>
        <select class="form-control" id="quantity" name="quantity">
        <option value="">quantity</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" value="<?php echo set_value('price');?>">
    </div>
    <div class="form-group">
      <label for="image">Product Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image" value="<?php echo set_value('image');?>">
    </div>
    <div class="form-group">
      <label for="productdetails">Product Details:</label>
      <textarea class="form-control" rows="5" id="productdetails" name="productdetails"></textarea>
    </div>
     <button type="submit" class="btn btn-default" name="addproducts" value="addproducts">Add Products</button>
  </form>
</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script>
      $(document).ready(function(){
       $('#category').change(function(event) {
            var val =  $('#category').val();
            if (val == '') {
            alert('Please select any category.');
            return false;
            }
            $.ajax({
              type   : "POST",
              url    : "<?php echo base_url(); ?>index.php/Product/Get_product" ,
              data   : 'cate_id='+val,
              success: function(data){
                 // alert('hhi');
               $("#product").html(data);
              

              }
           })
       });
       });
    </script>


