<?php

namespace app\repositories;

use app\interfaces\ProductRepositoryInterface;
use app\models\Product;
use yii\db\StaleObjectException;

class ProductRepository implements ProductRepositoryInterface
{
    public function save(Product $product): bool
    {
        return $product->save();
    }

    /**
     * @throws StaleObjectException
     */
    public function update(Product $product): bool
    {
        return (bool)$product->update();
    }

    public function deleteById(int $id): bool
    {
        return (bool)Product::deleteAll(['id' => $id]);
    }

    public function getById(int $id): Product|false
    {
        return Product::findOne(['id' => $id]) ?? false;
    }
}