<?php

require_once __DIR__ . '/../../Entities/Categories/CategoryEntity.php';
require_once __DIR__ . '/../../Interfacese/Categories/CategoryRepositoryInterface.php';

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * カテゴリー全取得
     *
     * @param object $pdo
     * @return CategoryEntity
     */
    public function getCategoryAll(object $pdo): CategoryEntity
    {
        $sql = 'select id, title from categories order by id';
        $st  = $pdo->prepare($sql);
        $st->execute();
        $categories = $st->fetchAll();
        if (empty($categories)) {
            return new CategoryEntity();
        }
        return new CategoryEntity($categories);
    }

    /**
     * カテゴリー登録
     *
     * @param object $pdo
     * @param integer $id
     * @param string $title
     * @return boolean
     */
    public function getCategoryCreate(object $pdo, int $id, string $title): bool
    {
        $sql = 'insert into categories (id, title) values (:id, :title)';
        $st = $pdo->prepare($sql);
        $st->bindValue(':id', $id, PDO::PARAM_INT);
        $st->bindValue(':title', $title, PDO::PARAM_STR);
        return $st->execute();
    }

    /**
     * カテゴリー取得
     *
     * @param object $pdo
     * @param integer $id
     * @return CategoryEntity
     */
    public function getCategoryForId(object $pdo, int $id): CategoryEntity
    {
        $sql = 'select id, title from categories where id = :id';
        $st  = $pdo->prepare($sql);
        $st->bindValue(':id', $id, PDO::PARAM_INT);
        $st->execute();
        $category = $st->fetch();

        if (empty($category)) {
            return new CategoryEntity();
        }
        return new CategoryEntity($category);
    }

    /**
     * カテゴリー更新
     *
     * @param object $pdo
     * @param integer $id
     * @param string $title
     * @return boolean
     */
    public function getCategoryUpdate(object $pdo, int $id, string $title): bool
    {
        $sql = 'update categories set title = :title where id = :id';
        $st  = $pdo->prepare($sql);
        $st->bindValue(':title', $title, PDO::PARAM_STR);
        $st->bindValue(':id', $id, PDO::PARAM_INT);
        return $st->execute();
    }

    /**
     * カテゴリー削除
     *
     * @param object $pdo
     * @param integer $id
     * @return boolean
     */
    public function getCategoryDelete(object $pdo, int $id): bool
    {
        $sql = 'delete from categories where id = :id';
        $st = $pdo->prepare($sql);
        $st->bindValue(':id', $id, PDO::PARAM_INT);
        return $st->execute();
    }

    /**
     * カテゴリーID、タイトル取得
     *
     * @param object $pdo
     * @return CategoryEntity
     */
    public function getCategoryIdAndTitle(object $pdo): CategoryEntity
    {
        $sql = 'select id, title from categories order by id';
        $st = $pdo->prepare($sql);
        $st->execute();
        $categoryIdAndTitle = $st->fetchAll();
        if (empty($categoryIdAndTitle)) {
            return new CategoryEntity();
        }
        return new CategoryEntity($categoryIdAndTitle);
    }
}