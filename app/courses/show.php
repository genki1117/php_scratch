<?php
require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Repositories/Courses/CoursesRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Courses/CoursesService.php';

$id = filter_input(INPUT_GET, 'id');
if ($id === '') {
    error_log('Validation: id is required.');
    header('Location: error.php');
    exit();
};
if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    error_log('Validation: id is not number.');
    header('Location: error.php');
    exit();
};

try {
    $coursesService = new CoursesService(
        new DatabaseManager(),
        new CoursesRepository()
    );

    $getCourseResult = $coursesService->getCourse($id);

    if (empty($getCourseResult)) {
        error_log('Validation: course is Invalid.');
        header('Location: error.php');
        exit();
    }

} catch(PDOException $e) {
    error_log('PDOException: ' . $e->getMessage());
    header('Location: error.php');
    exit();
}
?>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP DB</title>
</head>
<body>
    <h3>Courses - Show</h3>
    <hr>
    ID: <?= htmlspecialchars($getCourseResult->getCourses()['id']) ?><br>
    TITLE: <?= htmlspecialchars($getCourseResult->getCourses()['title']) ?><br>
    L-TIME: <?= htmlspecialchars($getCourseResult->getCourses()['learning_time']) ?><br>
    CATEGORY: <?= htmlspecialchars($getCourseResult->getCourses()['category_title']) ?><br>
    <a href="edit.php?id=<?= htmlspecialchars($getCourseResult->getCourses()['id']) ?>">EDIT</a>
    <form action="destroy.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($getCourseResult->getCourses()['id']) ?>">
        <button type="submit">DESTROY</button>
    </form>
    <hr>
    <a href="index.php">BACK</a>
</body>
</html>
