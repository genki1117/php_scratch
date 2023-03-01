<?php
declare(strict_types=1);

require_once __DIR__ . '/../../db/DatabaseManager.php';
require_once __DIR__ . '/../../classes/Repositories/Categories/CategoryRepository.php';
require_once __DIR__ . '/../../classes/Servicese/Categories/CategoryService.php';
require_once __DIR__ . '/../../util/function.php';

try {
    $categoryService = new CategoryService(
        new DatabaseManager(),
        new CategoryRepository()
    );
    $categories = $categoryService->getCategoryAll();
    require __DIR__ . '/../../view/categories/index.php';
    
} catch (PDOException $e) {
    error_log("PDOException: " . $e->getMessage());
    header("Location: error.php");
    exit();
}


