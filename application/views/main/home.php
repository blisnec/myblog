<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
</head>
<body>
<div style="width: 600px; margin: 0px auto;">
    <div style="text-align: right">
    <?php if($username): ?>
        <h3 id="username"><?php echo $username;?> | <a href="/users/logout" >Logout</a></h3>
     <?php else: ?>
    <a href="/users/login" >Login</a> |
    <a href="/users/signup">Sign up</a><br />
     <?php endif; ?>
    </div>
Home | <a href="/main/create/<?php echo $username;?>">Create new</a>
<?php if($data->num_rows() > 0): ?>
<?php foreach($data->result() as $i): ?>
<h1>
<a href="/main/article/<?=$i->article_id;?>/<?php echo $username;?>"><?=$i->article_title;?></a>
</h1>
<p style="font-style: italic">
<?php if(is_null($i->username)):
      echo 'anonymous';
      else: echo $i->username;
      endif;?>
</p>
<p><?=$i->article_text;?></p>
<p>
<a href="/main/edit/<?=$i->article_id;?>">Edit</a> |
<a href="/main/delete/<?=$i->article_id;?>" onclick="return confirm('Do you want delete?')">Delete</a>
</p>
<hr>
<?php endforeach; ?>
<?php endif; ?>
</div>
</body>
</html>