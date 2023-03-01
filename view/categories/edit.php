<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP DB</title>
</head>
<body>
<h3>Categories - Edit</h3>
<hr>
<form action="../../app/categories/update.php" method="post">
    <input type="hidden" name="id" value="<?= h($category->getCategory()['id'])?>">
    ID: <?= h($category->getCategory()['id'])?><br>
    TITLE: <input type="text" name="title" value="<?= h($category->getCategory()['title'])?>"><br>
    <button type="submit">UPDATE</button>
</form>
<hr>
<a href="../../app/categories/index.php">BACK</a>
</body>
</html>