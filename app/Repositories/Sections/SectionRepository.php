<?php

namespace App\Repositories\Sections;

use App\Repositories\BaseRepository;

interface SectionRepository extends BaseRepository
{
    public function createSection(array $data);
    public function updateSection($model, array $data);
    public function getProductBySection($sectionId);
    public function getInvoicesBySection($sectionId);
}
