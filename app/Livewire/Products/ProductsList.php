<?php

namespace App\Livewire\Products;

use App\Repositories\Products\ProductRepository;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


#[Title('products-list')]
class ProductsList extends Component
{
    use WithPagination;

    public $productId;

    #[Computed()]
    public function products(ProductRepository $productRepository)
    {
        return $productRepository->getDesc_Paginating(5);
    }

    public function edit($id)
    {
        $this->dispatch('getData', $id);
        $this->dispatch('show', 'edit-product');
    }


    public function targetProductId($id)
    {
        $this->productId = $id;
    }

    public function delete(ProductRepository $productRepository)
    {
        $product = $productRepository->find($this->productId);

        if ($product) {
            $productRepository->destroy($product);
            return redirect(route('product-list'))->with('danger', 'product has been deleted');
        }

        return redirect(route('product-list'))->with('warning', 'there is no product to delete');
    }

    public function render()
    {
        return view('livewire.products.products-list');
    }
}
