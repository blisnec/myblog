<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <title>Sign up</title>
</head>
<body>
Sign up | <a href="/main">Home</a>
<?php echo form_open(base_url().'index.php/users/signup'); ?>

<p><label>FullName:</label><br />
<?php echo form_error('fname'); ?>
<input type="text" name="fname" value="<?php echo set_value('fname'); ?>" size="50"/></p>

<p><label>Username:</label><br />
<?php echo form_error('username'); ?>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" /></p>

<p><label>Password:</label><br />
<?php echo form_error('password'); ?>
<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" /></p>

<p><label>Confirm Password:</label><br />
<?php echo form_error('passconf'); ?>
<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" /></p>

<p><label>E-mail:</label><br />
<?php echo form_error('email'); ?>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" /></p>

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>
