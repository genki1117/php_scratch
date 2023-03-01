<?php
require_once __DIR__ . '/../../Entities/Categories/CategoryEntity.php';

class CategoryService
{
    /** @var object DatabaseManager $databaseManagerObj */
    private object $databaseManagerObj;

    /** @var object CategoryRepository $categoryRepositoryObj */
    private object $categoryRepositoryObj;

    /**
     * @param object $databaseManagerObj
     * @param object $categoryRepositoryObj
     */
    public function __construct(
        object $databaseManagerObj,
        object $categoryRepositoryObj
    )
    {
        $this->databaseManagerObj    = $databaseManagerObj;
        $this->categoryRepositoryObj = $categoryRepositoryObj;
    }

    /**
     * カテゴリー全取得
     *
     * @return CategoryEntity
     */
    public function getCategoryAll(): CategoryEntity
    {
        $pdo        = $this->databaseManagerObj->getPdo();
        $categories = $this->categoryRepositoryObj->getCategoryAll($pdo);
        return $categories;
    }

    public function getCategoryCreate(int $id, string $title)
    {
        $pdo        = $this->databaseManagerObj->getPdo();
        $createResult = $this->categoryRepositoryObj->getCategoryCreate($pdo, $id, $title);
        return $createResult;
    }
    

    /**
     * カテゴリー取得
     *
     * @param integer $id
     * @return CategoryEntity
     */
    public function getCategory(int $id): CategoryEntity
    {
        $pdo      = $this->databaseManagerObj->getPdo();
        $category = $this->categoryRepositoryObj->getCategoryForId($pdo, $id);
        return $category;
    }

    /**
     * カテゴリー更新
     *
     * @param integer $id
     * @param string $title
     * @return boolean
     */
    public function getCategoryUpdate(int $id, string $title): bool
    {
        $pdo          = $this->databaseManagerObj->getPdo();
        $updateResult = $this->categoryRepositoryObj->getCategoryUpdate($pdo, $id, $title);
        return $updateResult;
    }

    /**
     * カテゴリー削除
     *
     * @param integer $id
     * @return boolean
     */
    public function getCategoryDelete(int $id): bool
    {
        $pdo          = $this->databaseManagerObj->getPdo();
        $deleteDelete = $this->categoryRepositoryObj->getCategoryDelete($pdo, $id);
        return $deleteDelete;
    }

    public function getCategoryIdAndTitle()
    {
        $pdo          = $this->databaseManagerObj->getPdo();
        $getCategoryIdAndTitle = $this->categoryRepositoryObj->getCategoryIdAndTitle($pdo);
        return $getCategoryIdAndTitle;
    }
}