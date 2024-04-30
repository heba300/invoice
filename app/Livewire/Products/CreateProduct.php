<?php

namespace App\Livewire\Products;

use App\Repositories\Products\ProductRepository;
use App\Repositories\Sections\SectionRepository;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CreateProduct extends Component
{
    public $name;
    public $description;
    public $section_id;

    public function resetModal()
    {
        $this->resetValidation();
        $this->reset('name', 'description');
    }

    #[Computed()]
    public function sections(SectionRepository $sectionRepository)
    {
        return $sectionRepository->getAll();
    }

    public function create(ProductRepository $productRepository)
    {
        $data = $this->validate();
        $product = $productRepository->getProductByName($this->name, $this->section_id);

        if ($product) {
            return redirect(route('product-list'))->with('warning', 'product name for this section already exists');
        }

        $productRepository->createProduct($data);
        $this->reset('name', 'description', 'section_id');

        return redirect(route('product-list'))->with('success', 'new product has been added');
    }

    public function render()
    {
        return view('livewire.products.create-product');
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:60',
            'description' => 'nullable',
            'section_id' => 'required'
        ];
    }
}
