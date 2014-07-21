<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <title>Log in</title>
</head>
<body>
<div style="width: 600px; margin: 0px auto;">
<div>
    <p><?php  echo $error;?></p>
Login | <a href="/main">Home</a> | <a href="/users/signup">Sign up</a>
<form method="post" action="<?php echo base_url(); ?>index.php/users/login">

<p><input type="text" name="username" value="username" /></p>

<p><input type="password" name="password" value="password" /></p>

<input type="submit" value=" Login" />

</div>
</div>
</body>
</html>