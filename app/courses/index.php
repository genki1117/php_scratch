<?php
require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Repositories/Courses/CoursesRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Courses/CoursesService.php';

try {
    $coursesService = new CoursesService(
        new DatabaseManager(),
        new CoursesRepository()
    );

    $courses = $coursesService->getCourseAll();

} catch (PDOException $e) {
    error_log('PDOException: ' . $e->getMessage());
    header('Location: error.php');
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
    <h3>Courses - index</h3>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>L-TIME</th>
            <th>CATEGORY_TITLE</th>
            <th>SHOW</th>
        </tr>
        <?php foreach ($courses->getCourses() as $course) { ?>
        <tr>
            <td><?= htmlspecialchars($course['id']) ?></td>
            <td><?= htmlspecialchars($course['title']) ?></td>
            <td><?= htmlspecialchars($course['learning_time']) ?></td>
            <td><?= htmlspecialchars($course['category_title']) ?></td>
            <td><a href="show.php?id=<?= htmlspecialchars($course['id']) ?>">SHOW</a></td>
        </tr>
        <?php } ?>
    </table>
    <hr>
    <a href="create.php">NEW</a>
</body>
</html>