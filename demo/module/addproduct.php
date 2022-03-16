<?php
require_once('config.php');
require_once('checklogin.php');
require_once 'header.php';

?>

<div id="page">
    <div style="height: 30px; float: right; margin-top: 30px;"><input name="submit" type="submit"  class="button" value="logout" onclick="window.location.href='logout.php'"></div>
    <div id="header">

     <h1> Add Product</h1>
     <div style="height: 30px; float: left; margin-top: 10px; ">
    <input name="submit" type="submit" class="button" value="Home" onclick="window.
    location.href='index.php'">

  <div id="content">
     <p id="status"></p>
     <form action="" method="post" id="addProduct" enctype="multipart/form-data">  
      <fieldset>
        <legend>Add Product</legend>
          <ul>

            <li>
              <label for="addproduct">
              <span class="required">Category:</span>
              </label>
              <select name="category" id="category-list" class="demoInputBox required" onChange="getproduct(this.value);">
                <option value="">Select Category</option>
                <?php
                 $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
                 $query="SELECT * FROM `product_category`";
                 $result=mysqli_query($conn,$query);
                 while($category=mysqli_fetch_array($result)){ ?>
                 <option value="<?php echo $category["id"]; ?>">
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
              <label for="quantity">
              <span class="required">Quantity:</span>
              </label>
              <select name="quantity" id="product-quantity" class=" required demoInputBox">
              <option value="">Select Quantity</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>

              </select>
            </li>
            <li>
              <label for="price">
              <span class="required">Price:</span>
              </label>
              <input type="number" min="1" name="price" id="price" class="required demoInputBox">
             
             
            </li>
             
            <li>
              <label for="product">
              <span class="required">Product Image:</span>
              </label>
              <input type="file" name="image" id="image" class="required" value="">
            </li>
            <li>
              <label for="product">
              <span class="required">Product Detail:</span>
              </label>
              <textarea name="product_details" id="details" value="" class="required" cols="40" rows="6" ></textarea>
            </li>
            <li>
              <button class="btn btn-primary" id="proceesBtn">Procees Button</button>
             
              <p><?php echo (!empty($error) ? $error : ''); ?></p>
              </div>
            </li>
          </ul>
            </li>
           
          </ul>
      </fieldset>
    
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">           
        <form action="" method="post" id="addProduct" enctype="multipart/form-data">
          <fieldset>
            <legend>Add Product</legend>
              <ul>
              
                <li>
                  <label for="addproduct">
                  <span class="required">Category:</span>
                  </label>
                  <select name="category" id="category-selectbox" class="demoInputBox required" onChange="getproduct_modal(this.value);">
                    <option value="">Select Category</option>
                    <?php
                     $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
                     $query="SELECT * FROM `product_category`";
                     $result=mysqli_query($conn,$query);
                     while($category=mysqli_fetch_array($result)){ ?>
                     <option value="<?php echo $category["id"]; ?>">
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
                  <select name="product" id="product-list-modal" class=" required demoInputBox">
                  <option value="<?php echo $product["id"]; ?>"><?php echo $product["product_name"]; ?></option>
                  </select>
                </li>
                   <li>
                  <label for="quantity">
                  <span class="required">Quantity:</span>
                  </label>
                  <select name="quantity" id="product-quantity-modal" class=" required demoInputBox">
                  <option value="">Select Quantity</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>

                  </select>
                </li>
                 <li>
                  <label for="price">
                  <span class="required">Price:</span>
                  </label>
                  <input type="number" min="1" name="price" id="modal_price" class="required demoInputBox">
                </li>
                
                <li>
                  <label for="product">
                  <span class="required">Product Image:</span>
                  </label>
                  <img src="" id="modal_image" height="70">
                  <!-- <input type="file" name="image" class="required" value=""> -->
                </li>
                <li>
                  <label for="product">
                  <span class="required">Product Detail:</span>
                  </label>
                  <textarea name="product_details" value="" id="modal_details" class="required" cols="40" rows="6" ></textarea>
                </li>
                <li>
                  <!-- <input  class="button" value="Add" type="submit" name="submit"> -->
                  </div>
                </li>
              </ul>
                </li>
               
              </ul>
          </fieldset>
          </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-success" id="confirmBtn">Confirm</button>
        <button type="button" class="btn btn-danger"  id="cancelBtn">Cancel</button>
        <button type="button" class="btn btn-primary" id="backBtn">Back</button>
      </div>
    </div>
  </div>
</div>
<?php require_once 'footer.php' ?>

<script>
  $('#proceesBtn').click(function(event) {
    // event.preventDefault();
    var elements = $("input[type!='submit']");
    //alert(elements);
    elements.focus(function() {
      $(this).parents('li').addClass('highlight');
    });
    elements.blur(function() {
      $(this).parents('li').removeClass('highlight');
    }); 

    $("#addProduct").validate({
      submitHandler: function(form) {
        var optionValue  = $('#category-list').val();
        $("#category-selectbox").val(optionValue).find("option[value=" + optionValue +"]").attr('selected', true);
          getproduct_modal(optionValue);
           var productValue = $('#product-list').val();
        $("#product-list-modal").val(productValue).find("option[value=" + productValue +"]").attr('selected', true);


        var quantityValue = $('#product-quantity').val();
        $("#product-quantity-modal").val(quantityValue).find("option[value=" + quantityValue +"]").attr('selected', true);
        
        $('#modal_price').val($('#price').val());
        
        
        $('#modal_details').val($('#details').val());
        // $(form).submit();
        $('#myModal').modal();
       
      }
    });    
  });

  $("#image").change(function () {
      imgPreview(this);
  });

  $('#confirmBtn').click(function(event) {
    var formdata = new FormData();
    var fileInput = document.getElementById('image');
    var file = fileInput.files[0];    
    formdata.append( 'image', file );
    formdata.append( 'category', $('#category-list').val() );
    formdata.append( 'product', $('#product-list').val() );

    formdata.append( 'price', $('#product-quantity').val() );
    formdata.append( 'quantity', $('#price').val() );
    formdata.append( 'product_details', $('#details').val() );    

    $.ajax({
      url: 'add_product.php',
      data: formdata,
      dataType: 'json',
      processData: false,
      contentType: false,
      type: 'POST',
      
    })
    .done(function(json) {
        if (json.status) {
          alert(json.message);
          $('#myModal').modal('hide');
          // $("#addProduct")[0].reset();
        } else {
          alert(json.message);
        }
    });
  });

  $('#backBtn').click(function(event) {
    $('#myModal').modal('hide');
  });

  $('#cancelBtn').click(function(event) {
    window.location.href="index.php";
  });



  function imgPreview(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#modal_image').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }  

  function getproduct(val) {
    if (val == '') {
      alert('Please select any category.');
      return false;
    }
    $.ajax({
    type: "POST",
    url : "getproduct.php",
    data:'category_id='+val,
    success: function(data){
      $("#product-list").html(data);

    }
    });
  }

  function getproduct_modal(val) {
    if (val == '') {
      alert('Please select any category.');
      return false;
    }
    $.ajax({
    type: "POST",
    url: "getproduct.php",
    data:'category_id='+val,
    success: function(data){
      // alert('hi');
      var product_sel = $("#product-list").val();
      $("#product-list-modal").html(data);
      $("#product-list-modal").val(product_sel);
      
    }
    });
  }
</script>