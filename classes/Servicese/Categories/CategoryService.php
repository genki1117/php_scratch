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
        $pdo = $this->databaseManagerObj->getPdo();
        return $this->categoryRepositoryObj->getCategoryAll(pdo: $pdo);
    }

    public function getCategoryCreate(int $id, string $title)
    {
        $pdo = $this->databaseManagerObj->getPdo();
        return $this->categoryRepositoryObj->getCategoryCreate(pdo: $pdo, id: $id, title: $title);

    }
    

    /**
     * カテゴリー取得
     *
     * @param integer $id
     * @return CategoryEntity
     */
    public function getCategory(int $id): CategoryEntity
    {
        $pdo = $this->databaseManagerObj->getPdo();
        return $this->categoryRepositoryObj->getCategoryForId(pdo: $pdo, id: $id);
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
        $pdo = $this->databaseManagerObj->getPdo();
        return $this->categoryRepositoryObj->getCategoryUpdate(pdo: $pdo, id: $id, title: $title);
    }

    /**
     * カテゴリー削除
     *
     * @param integer $id
     * @return boolean
     */
    public function getCategoryDelete(int $id): bool
    {
        $pdo = $this->databaseManagerObj->getPdo();
        return $this->categoryRepositoryObj->getCategoryDelete(pdo: $pdo, id: $id);
    }

    public function getCategoryIdAndTitle()
    {
        $pdo = $this->databaseManagerObj->getPdo();
        return $this->categoryRepositoryObj->getCategoryIdAndTitle(pdo: $pdo);
    }
}