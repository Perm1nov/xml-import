<?php

namespace app\interfaces;

use app\models\Product;

interface ProductRepositoryInterface
{
    public function getById(int $id): Product|false;
    public function save(Product $product): bool;
    public function update(Product $product): bool;
    public function deleteById(int $id): bool;
}