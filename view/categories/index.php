<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP DB</title>
</head>
<body>
<h3>Categories - index</h3>
<hr>
<table border="1">
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>SHOW</th>
    </tr>
    <?php foreach ($categories->getCategory() as $category) { ?>
        <tr>
            <td><?= h($category['id']) ?></td>
            <td><?= h($category['title']) ?></td>
            <td><a href="../../app/categories/show.php?id=<?= h($category['id']) ?>">SHOW</a></td>
        </tr>
    <?php } ?>
</table>
<hr>
<a href="../../view/categories/create.php">NEW</a>
</body>
</html>