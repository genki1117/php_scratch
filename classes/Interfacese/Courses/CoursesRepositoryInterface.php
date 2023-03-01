<?php
require_once('../../classes/Entities/Courses/CoursesEntity.php');

interface CoursesRepositoryInterface
{
    /**
     * コース全取得
     *
     * @param object $pdo
     * @return CoursesEntity
     */
    public function getCoursesAll(object $pdo): CoursesEntity;

    /**
     * コース取得ID,title
     *
     * @param object $pdo
     * @return CoursesEntity
     */
    public function getCoursesIdAndTitle(object $pdo): CoursesEntity;

    /**
     * コース登録
     *
     * @param object $pdo
     * @param integer $id
     * @param string $title
     * @param integer $learning_time
     * @param integer $category_id
     * @return boolean
     */
    public function getCoursesCreate(object $pdo, int $id, string $title, int $learning_time, int $category_id): bool;

    /**
     * コース取得
     *
     * @param object $pdo
     * @param integer $id
     * @return CoursesEntity
     */
    public function getCourse(object $pdo, int $id): CoursesEntity;

    public function getCourseUpdate(object $pdo, int $id);
}