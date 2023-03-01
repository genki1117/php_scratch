<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP DB</title>
</head>
<body>
    <h3>Categories - New</h3>
    <hr>
    <form action="../../app/categories/store.php" method="post">
        ID: <input type="text" name="id"><br>
        TITLE: <input type="text" name="title"><br>
        <button type="submit">STORE</button>
    </form>
    <hr>
    <a href="../../app/categories/index.php">BACK</a>
</body>
</html>