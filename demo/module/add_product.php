<?php 
  require_once("config.php");
// var_dump($_FILES);
// var_dump($_POST);
  $error = '';
  $isError = true;
  if (isset($_POST['category']) && isset($_POST['product']) && isset($_POST['product_details']) && isset($_POST['price']) && isset($_POST['quantity'])) {
    $category        = $_POST['category'];
    $product         = $_POST['product'];
    $price           = $_POST['price'];
    $quantity        = $_POST['quantity'];

    $product_details = $_POST['product_details'];
    // var_dump($_FILES['image']);
    $f_name          = $_FILES['image']['name'];
    $f_tmp           = $_FILES['image']['tmp_name'];
    $f_size          = $_FILES['image']['size'];
    $f_extension     = explode('.', $f_name);
    $ext             = $f_extension[1];
    $f_newname       = uniqid().'.'.$ext;
    $store           = 'pictures/'.$f_newname;
    if($ext == 'jpg' || $ext == 'png'|| $ext == 'gif' || $ext == 'jpeg') {
      if ($f_size >= 1000000) {
        $error = 'max size should be 1 mb';
      } else {
        $move = (move_uploaded_file($f_tmp, $store));
      }
    }
    
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    $query = "INSERT INTO product_details (`category_id`, `product_id`,`price`,`quantity`,`product_image`,`product_des`) VALUES ('$category', '$product','$quantity','$price','$f_newname', '$product_details')";
    $result= mysqli_query($conn , $query);
    if ($result) {
      $error = 'Product Added Successfully.';
      $isError = false;
      // echo " <p style='color: #f00'>Product Added Successfully.</p>";
    } else {
      $error = 'Unable to add Product.';
      // echo " <p style='color: #f00'>Unable to add Product</p>";
    }
  } else {
      $error = 'Please Provide all mandetory field.';
    // echo " <p style='color: #f00'>Please Provide all mandetory field.</p>";
  }   


if ($isError) {
  echo json_encode(['status' => false, 'message' => $error]);
} else {
  echo json_encode(['status' => true, 'message' => $error]);
}