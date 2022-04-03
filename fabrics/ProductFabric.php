<?php

namespace app\fabrics;

use app\models\dto\ProductDTO;
use app\models\Product;

class ProductFabric
{
    public function createFromDTO(ProductDTO $data): Product
    {
        $product = new Product();
        $product->name = $data->name;
        $product->description = $data->description;

        return $product;
    }
}