<?php

namespace App\Livewire\Invoices;

use App\Repositories\Invoices\InvoiceRepository;
use App\Repositories\Sections\SectionRepository;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CreateInvoice extends Component
{
    public $invoice_number;
    public $invoice_date;
    public $due_date;
    public $section_id;
    public $product_name;
    public $amount_collection;
    public $commission;
    public $discount;
    public $rate_vat;
    public $value_vat;
    public $total;
    public $notes;

    #[Computed()]
    public function sections(SectionRepository $sectionRepository)
    {
        return $sectionRepository->getAll();
    }

    #[Computed()]
    public function products(SectionRepository $sectionRepository)
    {
        return $sectionRepository->getProductBySection($this->section_id);
    }

    public function updated()
    {
        $this->value_vat = (float)$this->commission * (float) $this->rate_vat / 100;
        $this->total = ((float)$this->commission + (float) $this->value_vat) - (float)$this->discount;
    }

    public function create(InvoiceRepository $invoiceRepository)
    {
        if ($this->commission > ($this->amount_collection / 2)) {
            return redirect(route('invoice-list'))->with('danger', 'commission must not bigger than half of amount_collection');
        }

        $invoiceRepository->createInvoice($this->validate(), $this->value_vat, $this->total);
        return redirect(route('invoice-list'))->with('success', 'new invoice has been added');
    }

    public function render()
    {
        return view('livewire.invoices.create-invoice');
    }

    public function rules()
    {
        return [
            'invoice_number' => 'required|unique:invoices,invoice_number|min:5',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date',
            'section_id' => 'required',
            'product_name' => 'required',
            'amount_collection' => 'required',
            'commission' => 'required',
            'discount' => 'nullable',
            'rate_vat' => 'required',
            'notes' => 'nullable',
        ];
    }
}
