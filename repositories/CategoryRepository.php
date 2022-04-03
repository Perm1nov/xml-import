<?php

namespace app\repositories;

use app\interfaces\CategoryRepositoryInterface;
use app\models\Category;
use yii\db\StaleObjectException;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function save(Category $product): bool
    {
        return $product->save();
    }

    /**
     * @throws StaleObjectException
     */
    public function update(Category $product): bool
    {
        return (bool)$product->update();
    }

    public function deleteById(int $id): bool
    {
        return (bool)Category::deleteAll(['id' => $id]);
    }

    public function getById(int $id): Category|false
    {
        return Category::findOne(['id' => $id]) ?? false;
    }
}