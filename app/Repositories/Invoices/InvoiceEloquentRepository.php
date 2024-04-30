<?php

namespace App\Repositories\Invoices;

use App\Repositories\BaseEloquentRepository;

class InvoiceEloquentRepository extends BaseEloquentRepository implements InvoiceRepository
{
    public function createInvoice(array $data, $value_vat, $total)
    {
        $data['created_by'] = auth()->user()->email;
        $data['value_vat'] = $value_vat;
        $data['total'] = $total;
        $this->create($data);
    }

    public function getUnpaidInvoices()
    {
        return $this->model->where('status', 'unpaid_invoice')->paginate(5);
    }

    public function getPaidInvoices()
    {
        return $this->model->where('status', 'paid_invoice')->paginate(5);
    }

    public function getInvoiceByArchive()
    {
        return $this->model->onlyTrashed()->paginate(5);
    }

    public function restoreInvoice($id)
    {
        return $this->model->onlyTrashed()->where('id', $id)->restore();
    }

    public function deleteInvoice($id)
    {
        return $this->model->onlyTrashed()->where('id', $id)->forceDelete();
    }
}
