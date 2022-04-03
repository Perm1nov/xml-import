<?php

namespace app\interfaces;

use app\models\Category;

interface CategoryRepositoryInterface
{
    public function getById(int $id): Category|false;
    public function save(Category $product): bool;
    public function update(Category $product): bool;
    public function deleteById(int $id): bool;
}