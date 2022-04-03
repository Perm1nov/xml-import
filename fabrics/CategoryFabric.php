<?php

namespace app\fabrics;

use app\models\Category;
use app\models\dto\CategoryDTO;

class CategoryFabric
{
    public function createFromDTO(CategoryDTO $data): Category
    {
        $product = new Category();
        $product->name = $data->name;

        return $product;
    }
}