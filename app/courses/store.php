<?php
require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Repositories/Courses/CoursesRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Courses/CoursesService.php';

$id = (string)filter_input(INPUT_POST, 'id');
if ($id === '') {
    error_log('Validation: id is required.');
    header('Location: error.php');
    exit();
};
if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    error_log('Validation: id is not number.');
    header('Location: error.php');
    exit();
}

$title = (string)filter_input(INPUT_POST, 'title');
if ($title === '') {
    error_log('Validation: title is not required.');
    header('Location: error.php');
    exit();
};
if (mb_strlen($title) > 255) {
    error_log('Validation: title is over length.');
    header('Location: error.php');
    exit();
};

$learning_time = (string)filter_input(INPUT_POST, 'learning_time');
if ($learning_time === '') {
    error_log('Validation: learning_time is required.');
    header('Location: error.php');
    exit();
}
if (filter_var($learning_time, FILTER_VALIDATE_INT) === false) {
    error_log('Validation: learning_time id not number.');
    header('Location: error.php');
    exit();
}

$category_id = (string)filter_input(INPUT_POST, 'category_id');
if ($category_id === '') {
    error_log('Validation: category_id is required.');
    header('Location: error.php');
    exit();
}
if (filter_var($category_id, FILTER_VALIDATE_INT) === false) {
    error_log('Validation: category_id id not number.');
    header('Location: error.php');
    exit();
}
try {
    $coursesService = new CoursesService(
        new DatabaseManager(),
        new CoursesRepository()
    );
    
    $coursesCreateResult = $coursesService->coursesCreate(
        $id,
        $title,
        $learning_time,
        $category_id
    );
    if (!$coursesCreateResult) {
        error_log('Validation: create failed.');
        header('Location: error.php');
        exit();
    }
    header('Location: index.php');
} catch(PDOException $e) {
    error_log('PDOException' . $e->getMessage());
    header('Location: error.php');
    exit();
}
