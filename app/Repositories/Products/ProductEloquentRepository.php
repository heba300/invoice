<?php

namespace App\Repositories\Products;

use App\Repositories\BaseEloquentRepository;

class ProductEloquentRepository extends BaseEloquentRepository implements ProductRepository
{
    public function createProduct(array $data)
    {
        $data['created_by'] = auth()->user()->email;

        $this->create($data);
    }

    public function updateProduct($model, array $data)
    {
        $data['updated_by'] = auth()->user()->email;

        $this->update($model, $data);
    }

    public function getProductByName($productName, $sectionId)
    {
        return $this->model->select('name')->where('name', $productName)->where('section_id', $sectionId)->first();
    }
}
