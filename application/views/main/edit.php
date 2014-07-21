<!DOCTYPE html>
<html lang="en">
<head>
<title>Edite</title>
</head>
<body>
<div style="width: 600px; margin: 0px auto;">
    <a href="/main">Home</a> | <a href="/main/create">Create new</a>
    <form name="article" method="post" action="/main/save/<?=$article->article_id;?>">
        <p><input type="text" name="article_title" value="<?=$article->article_title;?>"></p>
        <p><textarea name="article_text"><?=$article->article_text;?></textarea></p>
        <p><input type="submit" value=" Save "></p>
    </form>
</div>
</body>
</html>