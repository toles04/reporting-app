<h3><?php echo lang('forgot_password_heading');?></h3>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open( base_url()."auth/forgot_password");?>

      <p>
      	<?php echo form_input($identity, '', 'placeholder="Email"');?>
      </p>

      <p><button name="submit" type="submit">Submit</button></p>

<?php echo form_close();?>

<p class="message"><a href="<?php echo base_url(); ?>auth/login">Back To Login</a></p>
