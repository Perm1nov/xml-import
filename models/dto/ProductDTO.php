<?php

namespace app\models\dto;

class ProductDTO
{
    public string $name;
    public string $description;
    public string $imageUrl;

    /**
     * @param string $name
     * @param string $description
     * @param string $imageUrl
     */
    public function __construct(string $name, string $description, string $imageUrl)
    {
        $this->name = $name;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
    }
}