<?php

require_once __DIR__ . '/../../Entities/Courses/CoursesEntity.php';
require_once __DIR__ . '/../../Interfacese/Courses/CoursesRepositoryInterface.php';

class CoursesRepository implements CoursesRepositoryInterface
{
    /**
     * コース全取得
     *
     * @param object $pdo
     * @return CoursesEntity
     */
    public function getCoursesAll(object $pdo): CoursesEntity
    {
        $sql = 'select courses.id, courses.title, courses.learning_time, courses.category_id, categories.title category_title from courses
                left join categories on courses.category_id = categories.id order by id';
        $st  = $pdo->prepare($sql);
        $st->execute();
        $courses = $st->fetchAll();

        if (empty($courses)) {
            return new CoursesEntity();
        }
        return new CoursesEntity($courses);
    }

    /**
     * コース取得ID,title
     *
     * @param object $pdo
     * @return CoursesEntity
     */
    public function getCoursesIdAndTitle(object $pdo): CoursesEntity
    {
        $sql = 'select id, title from courses order by id';
        $st = $pdo->prepare($sql);
        $st->execute();
        $coursesIdAndTitle = $st->fetchAll();
        if (empty($coursesIdAndTitle)) {
            return new CoursesEntity();
        };
        return new CoursesEntity($coursesIdAndTitle);
    }

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
    public function getCoursesCreate(object $pdo, int $id, string $title, int $learning_time, int $category_id): bool
    {
        $sql = 'insert into courses (id, title, learning_time, category_id) values (:id, :title, :learning_time, :category_id)';
        $st = $pdo->prepare($sql);
        $st->bindValue(':id', $id, PDO::PARAM_INT);
        $st->bindValue(':title', $title, PDO::PARAM_STR);
        $st->bindValue(':learning_time', $learning_time, PDO::PARAM_INT);
        $st->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $coursesCreateResult = $st->execute();
        return $coursesCreateResult;
    }

    /**
     * コース取得
     *
     * @param object $pdo
     * @param integer $id
     * @return CoursesEntity
     */
    public function getCourse(object $pdo, int $id): CoursesEntity
    {
        $sql = 'select courses.id, courses.title, courses.learning_time, courses.category_id, categories.title as category_title from courses
                left join categories on courses.category_id = categories.id where courses.id = :id';
        $st = $pdo->prepare($sql);
        $st->bindValue(':id', $id, PDO::PARAM_INT);
        $st->execute();
        $course = $st->fetch();
        if (empty($course)) {
            return new CoursesEntity();
        }
        return new CoursesEntity($course);
    }

    public function getCourseUpdate(object $pdo, int $id)
    {
        var_dump('test');
        exit();
    }
}