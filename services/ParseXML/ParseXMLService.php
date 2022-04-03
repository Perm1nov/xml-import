<?php

namespace app\services\ParseXML;

use app\fabrics\CategoryFabric;
use app\fabrics\ProductFabric;
use app\jobs\LoadProductImageJob;
use app\models\dto\GdeSlonXMLDTO;
use app\repositories\CategoryRepository;
use app\repositories\ProductRepository;
use Yii;

class ParseXMLService
{

    private GdeSlonXMLDTO $xmlDTO;

    public function __construct(GdeSlonXMLDTO $dto)
    {
        $this->xmlDTO = $dto;
    }

    public function perform(): void
    {
        $this->saveCategories();
        $this->saveProducts();
    }

    private function saveCategories(): void
    {
        $categoryRepository = new CategoryRepository();
        $categoryFabric = new CategoryFabric();

        foreach ($this->xmlDTO->categories as $category) {
            $productModel = $categoryFabric->createFromDTO($category);
            $categoryRepository->save($productModel);
        }
    }

    private function saveProducts(): void
    {
        $productRepository = new ProductRepository();
        $productFabric = new ProductFabric();

        foreach ($this->xmlDTO->products as $product) {
            $productModel = $productFabric->createFromDTO($product);
            $productRepository->save($productModel);

            Yii::$app->queue->push(new LoadProductImageJob($productModel->id, $product->imageUrl));
        }
    }
}