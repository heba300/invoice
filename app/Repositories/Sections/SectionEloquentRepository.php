<?php

namespace App\Repositories\Sections;

use App\Repositories\BaseEloquentRepository;

class SectionEloquentRepository extends BaseEloquentRepository implements SectionRepository
{
    public function createSection(array $data)
    {
        $data['created_by'] = auth()->user()->email;

        $this->create($data);
    }

    public function updateSection($model, array $data)
    {
        $data['updated_by'] = auth()->user()->email;

        $this->update($model, $data);
    }

    public function getProductBySection($sectionId)
    {
        return $this->model->find($sectionId)->products ?? [];
    }

    public function getInvoicesBySection($sectionId)
    {
        return $this->model->find($sectionId)->invoices ?? [];
    }
}
