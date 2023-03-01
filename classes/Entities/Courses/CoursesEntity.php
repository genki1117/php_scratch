<?php

class CoursesEntity
{
    private $courses;

    public function __construct
    (
        $courses = null
    )
    {
        $this->courses = $courses;
    }

    public function getCourses()
    {
        return $this->courses;
    }
}