<?php

namespace App\Repositories\Invoices;

use App\Repositories\BaseRepository;

interface InvoiceRepository extends BaseRepository
{
    public function createInvoice(array $data, $value_vat, $total);
    public function getUnpaidInvoices();
    public function getPaidInvoices();
    public function getInvoiceByArchive();
    public function deleteInvoice($id);
    public function restoreInvoice($id);
}
