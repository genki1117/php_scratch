<?php
require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Repositories/Courses/CoursesRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Courses/CoursesService.php';

try {
    $coursesService = new CoursesService(
        new DatabaseManager(),
        new CoursesRepository()
    );

    $gerCoursesIdAndTitle = $coursesService->getCoursesIdAndTitle();

} catch(PDOException $e) {
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
    <h3>Categories - New</h3>
    <hr>
    <form action="store.php" method="post">
        ID: <input type="text" name="id"><br>
        TITLE: <input type="text" name="title"><br>
        L-TIME: <input type="number" name="learning_time"><br>
        <label for="pet-select">CATEGORY:</label>
        <select name="category_id" id="">
            <option value="">選択してください</option>
            <?php foreach ($gerCoursesIdAndTitle->getCourses() as $course){ ?>
            <option value="<?= htmlspecialchars($course['id'])?>"><?= htmlspecialchars($course['title'])?></option>
            <?php } ?>
        </select><br>
        <button type="submit">STORE</button>
    </form>
    <hr>
    <a href="index.php">BACK</a>
</body>
</html>