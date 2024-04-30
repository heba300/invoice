<?php

namespace App\Livewire\Sections;

use App\Repositories\Sections\SectionRepository;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class EditSection extends Component
{
    public $section;
    public $name;
    public $description;

    #[On('getData')]
    public function getData($id, SectionRepository $sectionRepository)
    {
        $this->section = $sectionRepository->find($id);
        $this->name = $this->section->name;
        $this->description = $this->section->description;
    }

    public function update(SectionRepository $sectionRepository)
    {
        $data = $this->validate();
        if (preg_match('/\w+[_]\w+/', $this->name)) {
            $sectionRepository->updateSection($this->section, $data);
            return redirect(route('section-list'))->with('primary', 'section has been updated');
        }

        return redirect(route('section-list'))->with('danger', 'section name must like: word_word');
    }

    public function render()
    {
        return view('livewire.sections.edit-section');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:50', Rule::unique('sections', 'name')->ignore($this->section->id)],
            'description' => 'nullable'
        ];
    }
}
