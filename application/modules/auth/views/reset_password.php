<h3><?php echo lang('reset_password_heading');?></h3>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(base_url().'auth/reset_password/' . $code);?>

	<p>
		
		<?php echo form_input($new_password, '', 'placeholder="New Password"');?>
	</p>

	<p>
		
		<?php echo form_input($new_password_confirm, '', 'placeholder="Confirm New Password"');?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p><button name="submit" type="submit">Submit</button></p>

<?php echo form_close();?>

<p class="message"><a href="<?php echo base_url(); ?>auth/login">Back To Login</a></p>