<?php
require_once __DIR__ . '/../../Entities/Courses/CoursesEntity.php';
// require_once '../../Entities/Courses/CoursesEntity.php';

class CoursesService
{
    private object $databaseManagerObj;
    private object $coursesRepositoryObj;
    public function __construct
    (
        $databaseManager,
        $coursesRepository
    )
    {
        $this->databaseManagerObj = $databaseManager;
        $this->coursesRepositoryObj = $coursesRepository;
    }

    /**
     * コース内容全取得
     *
     * @return CoursesEntity
     */
    public function getCourseAll(): CoursesEntity
    {
        $pdo = $this->databaseManagerObj->getPdo();
        $courses = $this->coursesRepositoryObj->getCoursesAll($pdo);
        return $courses;
    }

    /**
     * コース内容IDとtitleのみ取得
     *
     * @return CoursesEntity
     */
    public function getCoursesIdAndTitle(): CoursesEntity
    {
        $pdo = $this->databaseManagerObj->getPdo();
        $coursesIdAndTitle = $this->coursesRepositoryObj->getCoursesIdAndTitle($pdo);
        return $coursesIdAndTitle;
    }
    /**
     * コース登録
     *
     * @param integer $id
     * @param string $title
     * @param integer $learning_time
     * @param integer $category_id
     * @return boolean
     */
    public function coursesCreate(int $id, string $title, int $learning_time, int $category_id): bool
    {
        $pdo = $this->databaseManagerObj->getPdo();
        $coursesCreateResult = $this->coursesRepositoryObj->getCoursesCreate(
            $pdo,
            $id,
            $title,
            $learning_time,
            $category_id
        );
        return $coursesCreateResult;
    }

    /**
     * コース取得
     *
     * @param integer $id
     * @return CoursesEntity
     */
    public function getCourse(int $id): CoursesEntity
    {
        $pdo = $this->databaseManagerObj->getPdo();
        $getCourseResult = $this->coursesRepositoryObj->getCourse($pdo, $id);
        return $getCourseResult;
    }

    public function coursesUpdate(int $id)
    {
        $pdo = $this->databaseManagerObj->getPdo();
        $getCourseUpdateResult = $this->coursesRepositoryObj->getCourseUpdate($pdo, $id);
        return $getCourseUpdateResult;
    }
}