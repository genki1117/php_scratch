<?php
declare(strict_types=1);

require_once __DIR__ . '/../../Entities/Categories/CategoryEntity.php';

interface CategoryRepositoryInterface
{
    /**
     * カテゴリー全取得
     *
     * @param object $pdo
     * @return CategoryEntity
     */
    public function getCategoryAll(object $pdo): CategoryEntity;

    /**
     * カテゴリー登録
     *
     * @param object $pdo
     * @param int $id
     * @param string $title
     * @return boolean
     */
    public function getCategoryCreate(object $pdo, int $id, string $title): bool;

    /**
     * カテゴリー取得
     *
     * @param object $pdo
     * @param integer $id
     * @return CategoryEntity
     */
    public function getCategoryForId(object $pdo, int $id): CategoryEntity;

    /**
     * カテゴリー更新
     *
     * @param object $pdo
     * @param integer $id
     * @param string $title
     * @return boolean
     */
    public function getCategoryUpdate(object $pdo, int $id, string $title): bool;

    /**
     * カテゴリー削除
     *
     * @param object $pdo
     * @param integer $id
     * @return boolean
     */
    public function getCategoryDelete(object $pdo, int $id): bool;

    /**
     * カテゴリーID、タイトル取得
     *
     * @param object $pdo
     * @return CategoryEntity
     */
    public function getCategoryIdAndTitle(object $pdo): CategoryEntity;

}