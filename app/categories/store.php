<?php
declare(strict_types=1);

require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Repositories/Categories/CategoryRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Categories/CategoryService.php';
require_once __DIR__ . '/../../util/const.php';

$id = (string)filter_input(INPUT_POST, "id");
if ($id === '') {
    error_log('Validation: id is required.');
    header('Location: error.php');
    exit();
};
if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    error_log('validation: id is not int.');
    header('Location: error.php');
    exit();
};
$id = (int)$id;

$title = (string)filter_input(INPUT_POST, 'title');
if ($title === '') {
    error_log('Validation: title is required.');
    header('Location: error.php');
    exit();
};
if (mb_strlen($title) > MAX_LENGTH) {
    error_log('Validation: title is length over.');
    header('Location: error.php');
    exit();
};

try {
    $categoryService = new CategoryService(
        new DatabaseManager(),
        new CategoryRepository()
    );
    $createResult = $categoryService->getCategoryCreate($id, $title);

    if (!$createResult) {
        error_log('Validation: create Invalid');
        header('Location: error.php');
    }
    header('Location: index.php');
    
} catch (PDOException $e) {
    error_log('PDOException: ' . $e->getMessage());
    header('Location: error.php');
}