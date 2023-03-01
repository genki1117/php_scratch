<?php
require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Repositories/Categories/CategoryRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Categories/CategoryService.php';
require_once __DIR__ . '/../../util/function.php';
require_once __DIR__ . '/../../util/const.php';

$id = (string)filter_input(INPUT_GET, 'id');
if ($id === '') {
    error_log('Validation: id is required');
    header('Location: error.php');
    exit();
}
if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    error_log('Validation: id is not number');
    header('Location: error.php');
    exit();
}
$id = (int)$id;

try {
    $categoryService = new CategoryService(
        new DatabaseManager(),
        new CategoryRepository()
    );
    $category = $categoryService->getCategory(id: $id);
    require __DIR__ . '/../../view/categories/show.php';

} catch(PDOException $e) {
    error_log('PDOException: ' . $e->getMessage());
    header('Location: error.php');
}

