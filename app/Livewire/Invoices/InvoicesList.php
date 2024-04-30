<?php

namespace App\Livewire\Invoices;

use App\Repositories\Invoices\InvoiceRepository;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


#[Title('invoice-list')]
class InvoicesList extends Component
{

    use WithPagination;

    #[Computed()]
    public function invoices(InvoiceRepository $invoiceRepository)
    {
        return $invoiceRepository->getDesc_Paginating(5);
    }

    public function render()
    {
        return view('livewire.invoices.invoices-list');
    }
}
