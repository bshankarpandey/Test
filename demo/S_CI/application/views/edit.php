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
  <h2>Edit Product</h2>
     
  <form method="post"  action="<?php echo base_url();?>index.php/Product/Edit_All/<?php echo $result[0]['id'];?>" enctype = "multipart/form-data"/>
    
     <h5 style="color: red"><?php echo validation_errors(); ?></h5> 
    <div class="form-group">
      <label for="category">Select Category </label>
        
        <select class="form-control" id="category" name="category" value =""> 
        
              <?php foreach($cate_name as  $data){ ?>

           <option value="<?php echo $data['id'];?>" <?php if($data['id'] == $result[0]['cate_id']) {echo 'selected';}?>> <?php echo $data['cate_name'];?></option>   
            <?php 
              }
           
            ?> 
        
       </select>
      <br>

      <label for="products">Select Products</label>
        <select class="form-control" id="product" name="product">
          <option value="<?php echo $result[0]['product_id']; ?>"><?php echo $result[2]['product_name'];?></option>
       
       
       </select>
      
   <div class="form-group">
      <label for="productquantity">Productquantity </label>
        <select class="form-control" id="quantity" name="quantity" value="<?php echo $result[0]['quantity'];?>">
       
        <option value="1" <?php if($result[0]['quantity'] == '1'){echo 'selected';} ?>>1</option>
        <option value="2" <?php if($result[0]['quantity'] == '2'){echo 'selected';} ?>>2</option>
        <option value="3" <?php if($result[0]['quantity'] == '3'){echo 'selected';} ?>>3</option>
        <option value="4" <?php if($result[0]['quantity'] == '4'){echo 'selected';} ?>>4</option>
      </select>
      
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id = "price" placeholder="Enter price" name="price" value="<?php echo  $result[0]['price'];?>">
    </div>
    <div class="form-group">
      <label for="image">Product Image:</label>
      <input type="file" class="form-control" id = "image" placeholder= "Enter Image" name="image" value=""><img height = "100" src = "<?php echo base_url("./uploads/" . $result[0]['image']);?>">
    </div>
    <div class="form-group">
      <label for="productdetails">Product Details:</label>
     <textarea class="form-control" rows="5" id="productdetails" name="productdetails" > <?php echo $result[0]['product_details'];?></textarea>
    </div>
     <button type="submit" class="btn btn-default" name="editproduct" value="editproduct">Edit Products</button>
     
  </form>
</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
      $(document).ready(function(){
       $('#category').change(function(event) {
            var val =  $('#category').val();
            if (val == '') {
            alert('Please select any Category.');
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
