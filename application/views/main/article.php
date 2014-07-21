<!DOCTYPE html>
<html lang="en">
<head>
<title>Article</title>
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
    <a href="/main">Home</a> | <a href="/main/create">Create new</a>
    <h1><?=$article->article_title;?></h1>
    <p><?=$article->article_text;?></p>
    <p>
        <a href="/main/edit/<?=$article->article_id;?>">Edit</a> |
        <a href="/main/delete/<?=$article->article_id;?>" onclick="return confirm('Do you want delete?')">Delete</a>
    </p>
    <?php if($comments->num_rows() > 0): ?>
        <h2>Comments</h2>
        <ul>
            <?php foreach($comments->result() as $i): ?>
            <li>
                <b><?=$i->comment_user_name;?></b>
                <p><?=$i->comment_text;?></p>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h2>Add comment</h2>
    <form name="article" method="post" action="/main/add_comment/">
        <input type="hidden" name="article_id" value="<?=$article->article_id;?>">
        <p><input type="text"  name="comment_user_name" value="<?php if($username): echo $username; endif;?>"></p>
        <p><textarea name="comment_text"></textarea></p>
        <p><input type="submit" value=" Save "></p>
    </form>
</div>
</body>
</html>