<?php

namespace App\Repositories\Products;

use App\Repositories\BaseRepository;

interface ProductRepository extends BaseRepository
{
    public function createProduct(array $data);
    public function updateProduct($model, array $data);
    public function getProductByName($productName, $sectionId);
}
