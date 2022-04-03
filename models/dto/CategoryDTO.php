<?php

namespace app\models\dto;

class CategoryDTO
{
    public string $name;

    /**
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}