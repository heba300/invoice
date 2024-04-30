<?php

namespace App\Livewire\Reports\Invoice;

use App\Repositories\Invoices\InvoiceRepository;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('invoice-reports')]
class InvoicesData extends Component
{
    public $invoice_id;

    #[Computed()]
    public function invoices(InvoiceRepository $invoiceRepository)
    {
        return $invoiceRepository->getDesc_Paginating(5);
    }

    public function sendData($id)
    {
        $this->dispatch('show', 'invoice-report');
        $this->dispatch('sendData', $id);
    }

    public function targetInvoiceId($id)
    {
        $this->invoice_id = $id;
    }

    public function delete(InvoiceRepository $invoiceRepository)
    {
        $invoice = $invoiceRepository->find($this->invoice_id);

        if ($invoice) {
            $invoiceRepository->destroy($invoice);
            return redirect(route('invoices-reports'))->with('danger', 'invoice has been archived');
        }

        return redirect(route('invoices-reports'))->with('warning', 'invoice not found');
    }

    public function render()
    {
        return view('livewire.reports.invoice.invoices-data');
    }
}
