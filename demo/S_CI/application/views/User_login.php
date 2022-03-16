<!DOCTYPE html>
<html lang="en">
<head>
  <title>login page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
  <?php echo $this->session->flashdata('success_msg'); ?>
  <?php echo $this->session->flashdata('err_msg'); ?>
  <?php echo $this->session->flashdata('error_msg'); ?>
  <div style="float: right; margin-top: 60px">
 <select onchange="javascript:window.location.href='<?php echo base_url(); ?>index.php/Users/SwitchLanguage/'+this.value;">
   <!-- <h4><?php echo $this->lang->line('welcome_message');?></h4> -->
   
    <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
    <option value="hindi" <?php if($this->session->userdata('site_lang') == 'hindi') echo 'selected="selected"'; ?>>हिंदी</option>
  </select> 
  </div><br><br>
  <h2><?php echo $this->lang->line('Login Here');?></h2>
  <form method="post" action="<?php echo base_url();?>index.php/users/login">
  <h5 style="color: red"><?php echo validation_errors(); ?></h5> 
    <div class="form-group">
      <label for="username"><?php echo $this->lang->line('Username');?>:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo set_value('username');?>">
    </div>
    <div class="form-group">
      <label for="pwd"><?php echo $this->lang->line('Password');?>:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo set_value('password'); ?>" >
    </div>
    
    <button type="submit" class="btn btn-default" name="login" value="login"><?php echo $this->lang->line('Login');?></button>
  </form>
</div>

</body>
</html>
