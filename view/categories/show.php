<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP DB</title>
</head>
<body>
<h3>Categories - Show</h3>
<hr>
ID: <?= h($category->getCategory()['id']) ?><br>
TITLE: <?= h($category->getCategory()['title']) ?><br>
<a href="../../app/categories/edit.php?id=<?= h($category->getCategory()['id']) ?>">EDIT</a>
<form action="../../app/categories/destroy.php" method="post">
    <input type="hidden" name="id" value="<?= h($category->getCategory()['id']) ?>">
    <button type="submit">DESTROY</button>
</form>
<hr>
<a href="../../app/categories/index.php">BACK</a>
</body>
</html>