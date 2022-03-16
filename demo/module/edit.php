<?php
require_once('config.php');
require_once('checklogin.php');
require_once('header.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  $query = "SELECT * FROM `product_details` WHERE `id`= '$id'";
  $result = mysqli_query($conn,$query);
  if ($row = mysqli_fetch_array($result)) {
    $data = array();
    $data['id']            = $row['id'];
    $data['product_id']    = $row['product_id'];
    $data['category_id']   = $row['category_id'];
    $data['product_des']   = $row['product_des'];
    $data['product_image'] = $row['product_image'];
    $data['status']        = $row['status'];
  } else {
    header("Location:index.php");
    exit();
  }
} else {
  header("Location:index.php");
  exit();
}


if(isset($_POST['submit'])){
   $error = '';
   if (isset($_POST['category']) && isset($_POST['product']) && isset($_POST['product_details']) && isset($_FILES['image'])) {
    $category = $_POST['category'];
    $product  = $_POST['product'];
    $product_details = $_POST['product_details'];
    // var_dump(($_FILES['image']['name']));exit();
    if ($_FILES['image']['name'] == '') {
      $f_newname = $data['product_image'];
    } else {
      $f_name = $_FILES['image']['name'];
      $f_tmp = $_FILES['image']['tmp_name'];
      $f_size = $_FILES['image']['size'];
      $f_extension = explode('.', $f_name);
      $ext = $f_extension[1];
      $f_newname =uniqid().'.'.$ext;
      $store = 'pictures/'.$f_newname;
      if($ext == 'jpg' || $ext == 'png'|| $ext == 'gif' || $ext == 'jpeg') {
        if ($f_size >= 1000000) {
          $error = 'max size should be 1 mb';
        } else {
          $move = (move_uploaded_file($f_tmp, $store));
          unlink('pictures/'.$data['product_image']);
        }
      }      
    }
    
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    $query = "UPDATE `product_details` SET `category_id`='$category',`product_id`='$product',`product_image`='$f_newname',`product_des`='$product_details' WHERE `id`='$id'";
    
    $result= mysqli_query($conn , $query);
    if ($result) {
      $error = 'Product updated Successfully.';
      
    } else {
      $error = 'Unable to edit Product.';
  
    }
  } else {
      $error = 'Please Provide all mandetory field.';
    
  }   
}

?>


<div id="page">
    <div style="height: 30px; float: right; margin-top: 50px;"><input name="submit" type="submit"  class="button" value="logout" onclick="window.location.href='logout.php'"></div>
    <div id="header">

     <h1> Edit Product</h1>
     <div style="height: 30px; float: left; margin-top: 10px; ">
    <input name="submit" type="submit" class="button" value="Home" onclick="window.
    location.href='index.php'">
  </div>

    </div>
  <div id="content">
    <p id="status"></p>
    <form action="" method="post" id="editproduct" enctype="multipart/form-data">           
      <fieldset>
        <legend>Edit Product</legend>
          <ul>

            <li>
              <label for="edit">
              <span class="required">Category:</span>
              </label>
              <select name="category" id="category-list" class="demoInputBox required" onChange="getproduct(this.value);">
                <option value="">Select Category</option>
                <?php
                 $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
                 $query = "SELECT * FROM `product_category`";
                 $result= mysqli_query($conn,$query);
                 while($category = mysqli_fetch_array($result)){ ?>
                 <option <?php if($data['category_id'] == $category["id"]) { echo 'selected';} ?> value="<?php echo $category["id"]; ?>">
                <?php echo $category["category_name"]; ?></option>
                <?php
                }
                ?>
              </select>
            </li>
            <li>
              <label for="procuct">
              <span class="required">Product:</span>
              </label>
              <select name="product" id="product-list" class=" required demoInputBox">
              <option value="">Select Product</option>
              </select>
            </li>
          
            <li>
              <label for="product">
              <span class="required">Product Image:</span>
              </label>

              <input type="file" name="image" class="" value=""><br>
              <img height="100" src="pictures/<?php echo $data['product_image']; ?>">
            </li>
            <li>
              <label for="product">
              <span class="required">Product Detail:</span>
              </label>
              <textarea name="product_details" value="" class="required" cols="40" rows="6" ><?php echo trim($data['product_des']); ?></textarea>
            </li>
            <li>
              <label for="product">
              <span class="required">Product Status:</span>
              </label>
              <p><?php echo $data['status']; ?></p>
            </li>
            <li>
              <input name="submit" type="submit" class="button" value="Edit">
              <p><?php echo (!empty($error) ? $error : ''); ?></p>
              </div>
            </li>
          </ul>
            </li>
           
          </ul>
      </fieldset>
    </form>
  </div>
</div>
<?php
require_once('footer.php');
?>
<script>
  $(function() {
    // highlight
    var elements = $("input[type!='submit'], textarea, select");
    console.log(elements);
    elements.focus(function() {
      $(this).parents('li').addClass('highlight');
    });
    elements.blur(function() {
      $(this).parents('li').removeClass('highlight');
    });

    

    $("#editproduct").validate()
  });
  function getproduct(val) {
    if (val == '') {
      alert('Please select any category.');
      return false;
    }
    $.ajax({
    type: "POST",
    url: "getproduct.php",
    data:'category_id='+val,
    success: function(data){
      $("#product-list").html(data);
    }
    });
  }
  getproduct($('#category-list').val());
  </script>
