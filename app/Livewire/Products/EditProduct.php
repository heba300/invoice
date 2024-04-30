<?php

namespace App\Livewire\Products;

use App\Repositories\Products\ProductRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class EditProduct extends Component
{
    public $product;
    public $name;
    public $description;

    #[On('getData')]
    public function getData($id, ProductRepository $productRepository)
    {
        $this->product = $productRepository->find($id);
        $this->name = $this->product->name;
        $this->description = $this->product->description;
    }

    public function update(ProductRepository $productRepository)
    {
        $product = $productRepository->getProductByName($this->name, $this->product->section_id);

        if ($product) {
            return redirect(route('product-list'))->with('warning', 'product name for this section already exists');
        }

        $productRepository->updateProduct($this->product, $this->validate());
        return redirect(route('product-list'))->with('primary', 'product has been updated');
    }

    public function render()
    {
        return view('livewire.products.edit-product');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'nullable'
        ];
    }
}
