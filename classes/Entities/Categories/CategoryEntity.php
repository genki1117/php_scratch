<?php
declare(strict_types=1);
class CategoryEntity
{
    private mixed $category;

    public function __construct
    (
        array $category = null
    )
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }
}