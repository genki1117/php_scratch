<?php
declare(strict_types=1);

require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Repositories/Categories/CategoryRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Categories/CategoryService.php';
require_once __DIR__ . '/../../util/function.php';

$id = filter_input(INPUT_GET, 'id');
if ($id === '') {
    error_log('Validation: id is required.');
    header('Location: error.php');
    exit();
}
if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    error_log('Validation: id is no number.');
    header('Location: error.php');
}

try {
    $categoryService = new CategoryService(
        new DatabaseManager,
        new CategoryRepository
    );
    $category = $categoryService->getCategory(id: $id);
    require __DIR__ . '/../../view/categories/edit.php';

    if (empty($category)) {
        error_log('Invalid id.');
        header('Location: error.php');
        exit();
    }

    require __DIR__ . '/../../view/categories/edit.php';
} catch (PDOException $e) {
    error_log('PDOException: ' . $e->getMessage());
    header('Location: error.php');
}