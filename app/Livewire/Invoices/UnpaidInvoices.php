<?php

namespace App\Livewire\Invoices;

use App\Repositories\Invoices\InvoiceRepository;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


#[Title('unpaid_invoices')]
class UnpaidInvoices extends Component
{
    use WithPagination;

    public $invoice_id;

    #[Computed()]
    public function unpaidInvoices(InvoiceRepository $invoiceRepository)
    {
        return $invoiceRepository->getUnpaidInvoices();
    }

    public function targetInvoiceId($id)
    {
        $this->invoice_id = $id;
    }

    public function update(InvoiceRepository $invoiceRepository)
    {
        $invoice = $invoiceRepository->find($this->invoice_id);

        if (!$invoice) {
            return redirect(route('unpaid-invoice'))->with('danger', 'there is no invoice to update');
        }

        $invoice->update(['status' => 'paid_invoice', 'updated_by' => auth()->user()->email]);
        return redirect(route('unpaid-invoice'))->with('success', 'invoice has been update');
    }

    public function render()
    {
        return view('livewire.invoices.unpaid-invoices');
    }
}
