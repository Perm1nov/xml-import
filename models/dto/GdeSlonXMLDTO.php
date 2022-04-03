<?php

declare(strict_types=1);

namespace app\models\dto;

use SimpleXMLElement;
use yii\base\InvalidArgumentException;

class GdeSlonXMLDTO
{
    public array $categories;
    public array $products;

    /**
     * @param SimpleXMLElement|false $xml
     */
    public function __construct(SimpleXMLElement|false $xml)
    {
        $categories = [];
        $products = [];

        if (!$xml) {
            throw new InvalidArgumentException('No data');
        }

        foreach ($xml->shop->categories->category as $category) {
            $categories[] = new CategoryDTO((string)$category);
        }
        foreach ($xml->shop->offers->offer as $product) {
            $products[] = new ProductDTO(
                (string)$product->name,
                (string)$product->description,
                (string)$product->thumbnail
            );
        }

        $this->categories = $categories;
        $this->products = $products;
    }
}