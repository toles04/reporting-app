<h3>Login</h3>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(base_url().'auth/login', 'class="login-form"');?>

  <p>
    <?php echo form_input($identity, '', 'placeholder="Email"');?>
  </p>

  <p>
    <?php echo form_input($password, '', 'placeholder="Password"');?>
  </p>

  <p class="message">
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>

  <p><button name="submit" type="submit">Login</button></p>

<?php echo form_close();?>
<p class="message"><a href="<?php echo base_url(); ?>auth/forgot_password"><?php echo lang('login_forgot_password');?></a></p>
