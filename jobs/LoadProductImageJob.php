<?php

namespace app\jobs;

use app\repositories\ProductRepository;
use Exception;
use yii\db\StaleObjectException;
use yii\queue\JobInterface;

class LoadProductImageJob implements JobInterface
{
    public int $productId;
    public string $imageUrl;

    /**
     * @param int $productId
     * @param string $imageUrl
     */
    public function __construct(int $productId, string $imageUrl)
    {
        $this->productId = $productId;
        $this->imageUrl = $imageUrl;
    }

    /**
     * @throws StaleObjectException
     * @throws Exception
     */
    public function execute($queue)
    {
        $productRepository = new ProductRepository();
        $product = $productRepository->getById($this->productId);

        if (!$product) {
            return;
        }

        $productImage = $this->loadImage($this->imageUrl);
        if ($productImage) {
            $product->image = $productImage;
            $productRepository->update($product);
        }
    }

    /**
     * @throws Exception
     */
    private function loadImage(string $url, string $path = '/app/upload/product/images/'): ?string
    {
        $filePath = $path . $this->uniqId() . '.' . pathinfo($url, PATHINFO_EXTENSION);
        $content = file_get_contents("http:$url");

        if (
            $content &&
            (is_dir($path) || mkdir($path, 0755, true)) &&
            file_put_contents($filePath, $content)
        ) {
            return $filePath;
        }

        return null;
    }

    /**
     * @throws Exception
     */
    private function uniqId(): string
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil(13 / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil(13 / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, 13);
    }
}