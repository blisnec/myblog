<!DOCTYPE html>
<html lang="en">
<head>
<title>Create New</title>
</head>
<body>
<div style="width: 600px; margin: 0px auto;">
    <a href="/main">Home</a>
    <form name="article" method="post" action="/main/add/">
        <p><input type="text" name="article_title" value=""></p>
        <p><textarea name="article_text"></textarea></p>
        <p><input type="submit" value=" Save "></p>
        <p><input type="hidden" name="username" value="<?php echo $username;?>"></p>
    </form>
</div>
</body>
</html>