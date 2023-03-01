<?php
declare(strict_types=1);

require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Repositories/Categories/CategoryRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Categories/CategoryService.php';

$id = filter_input(INPUT_POST, 'id');
if ($id === '') {
    error_log('Validation: id is required.');
    header('Location: error.php');
    exit();
}
if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    error_log('Validation: id is Invalid');
    header('Location: error.php');
    exit();
}

try {
    $categoryService = new CategoryService(
        new DatabaseManager,
        new CategoryRepository
    );
    $deleteResult = $categoryService->getCategoryDelete($id);

    if (!$deleteResult) {
        error_log('Validation: delete invalid.');
        header('Location: error.php');
        exit();
    }
    header('Location: index.php');

} catch(PDOException $e) {
    error_log('Validation: ' . $e->getMessage());
    header('Location: error.php');
    exit();
}