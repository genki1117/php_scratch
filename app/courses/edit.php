<?php
require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Servicese/Courses/CoursesService.php';
require_once __DIR__ . '/../../classes/Repositories/Courses/CoursesRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Categories/CategoryService.php';
require_once __DIR__ . '/../../classes/Repositories/Categories/CategoryRepository.php';

$id = (string)filter_input(INPUT_GET, 'id');

if ($id === '') {
    error_log('Validation: id is required.');
    header('Location: error.php');
    exit();
}

if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    var_dump('test');
    exit();
    error_log('Validation: id is not number.');
    header('Location: error.php');
    exit();
}

function h($value){
    return htmlspecialchars($value);
}

try {

    $coursesService = new CoursesService(
        new DatabaseManager(),
        new CoursesRepository()
    );
    $categoryService = new CategoryService(
        new DatabaseManager(),
        new CategoryRepository()
    );
    $courseResult = $coursesService->getCourse($id);
    $categoryIdAndTitle = $categoryService->getCategoryIdAndTitle();


    var_dump($categoryIdAndTitle->getCategory());
    var_dump($courseResult->getCourses());

} catch (PDOException $e) {
    error_log('PDOException: ' . $e->getMessage());
    header('Location: error.php');
    exit();
}

?>

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
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= h($courseResult->getCourses()['id'])?>">
    ID: <?= htmlspecialchars($courseResult->getCourses()['id'])?><br>
    TITLE: <input type="text" name="title" value="<?= htmlspecialchars($courseResult->getCourses()['title'])?>"><br>
    L-TIME: <input type="text" name="learning_time" value="<?= htmlspecialchars($courseResult->getCourses()['learning_time'])?>"><br>
    <label for="pet-select">CATEGORY:</label>
    <select name="pets" id="pet-select">
        <?php foreach ($categoryIdAndTitle->getCategory() as $category) { ?>
            <option value="<?= h($category['id'])?>"
            <?php h($category['id']) === h($courseResult->getCourses()['id']) ? 'selected':'' ?>
            ><?= h($category['title'])?></option>
        <?php } ?>

    </select><br>
    <button type="submit">UPDATE</button>
</form>
<hr>
<a href="index.php">BACK</a>
</body>
</html>
