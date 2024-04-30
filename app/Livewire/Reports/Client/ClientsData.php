<?php

namespace App\Livewire\Reports\Client;

use App\Repositories\Sections\SectionRepository;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


#[Title('client-report')]
class ClientsData extends Component
{
    use WithPagination;

    public $search = '';

    #[Computed()]
    public function invoices(SectionRepository $sectionRepository)
    {
        return $sectionRepository->getInvoicesBySection($this->search);
    }

    #[Computed()]
    public function sections(SectionRepository $sectionRepository)
    {
        return $sectionRepository->getAll();
    }

    public function render()
    {
        return view('livewire.reports.client.clients-data');
    }
}
