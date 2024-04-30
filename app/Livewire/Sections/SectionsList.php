<?php

namespace App\Livewire\Sections;

use App\Repositories\Sections\SectionRepository;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


#[Title('sections-list')]
class SectionsList extends Component
{

    use WithPagination;

    public $sectionId;

    #[Computed()]
    public function allSections(SectionRepository $sectionRepository)
    {
        return $sectionRepository->getDesc_Paginating(5);
    }

    public function edit($id)
    {
        $this->dispatch('getData', $id);
        $this->dispatch('show', 'edit-section');
    }

    public function targetSectionId($id)
    {
        $this->sectionId = $id;
    }

    public function delete(SectionRepository $sectionRepository)
    {
        $section = $sectionRepository->find($this->sectionId);

        if ($section) {
            $sectionRepository->destroy($section);
            return redirect(route('section-list'))->with('danger', 'section has been deleted');
        }

        return redirect(route('section-list'))->with('warning', 'there is no section to Delete!');
    }

    public function render()
    {
        return view('livewire.sections.sections-list');
    }
}
