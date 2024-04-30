<?php

namespace App\Livewire\Reports\Invoice;

use App\Repositories\Invoices\InvoiceRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class InvoicesDetails extends Component
{
    public $invoice;

    #[On('sendData')]
    public function getData(InvoiceRepository $invoiceRepository, $id)
    {
        return $this->invoice = $invoiceRepository->find($id);
    }

    public function changeStatus()
    {
        $this->invoice->status == 'paid_invoice' ? $this->invoice->update(['status' => 'unpaid_invoice'])
            : $this->invoice->update(['status' => 'paid_invoice']);
    }

    public function render()
    {
        return view('livewire.reports.invoice.invoices-details');
    }
}
