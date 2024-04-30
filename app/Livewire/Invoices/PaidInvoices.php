<?php

namespace App\Livewire\Invoices;

use App\Repositories\Invoices\InvoiceRepository;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('paid_invoice')]
class PaidInvoices extends Component
{

    #[Computed()]
    public function paidInvoice(InvoiceRepository $invoiceRepository)
    {
        return $invoiceRepository->getPaidInvoices();
    }

    public function render()
    {
        return view('livewire.invoices.paid-invoices');
    }
}
