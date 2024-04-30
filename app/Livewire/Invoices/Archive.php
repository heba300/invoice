<?php

namespace App\Livewire\Invoices;

use App\Repositories\Invoices\InvoiceRepository;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('archive')]
class Archive extends Component
{
    public $invoice_id;

    #[Computed()]
    public function invoices(InvoiceRepository $invoiceRepository)
    {
        return $invoiceRepository->getInvoiceByArchive();
    }

    public function targetInvoiceId($id)
    {
        $this->invoice_id = $id;
    }

    public function update(InvoiceRepository $invoiceRepository)
    {
        $invoiceRepository->restoreInvoice($this->invoice_id);

        return redirect(route('archived-invoices'))->with('success', 'invoice has been restored');
    }

    public function delete(InvoiceRepository $invoiceRepository)
    {
        $invoiceRepository->deleteInvoice($this->invoice_id);

        return redirect(route('archived-invoices'))->with('danger', 'invoice has been deleted');
    }

    public function render()
    {
        return view('livewire.invoices.archive');
    }
}
