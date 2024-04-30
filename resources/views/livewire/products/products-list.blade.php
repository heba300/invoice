<div>
    <x-slot name="conentHeader">
        <x-conent-header title="products" main="Settings" />
    </x-slot>

    <x-alert name="success" />
    <x-alert name="primary" />
    <x-alert name="warning" />
    <x-alert name="danger" />

    <livewire:products.create-product />
    <livewire:products.edit-product />
    @include('components.delete-modal', ['itemName' => 'product'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#product-create">
                        Add Product
                    </button>


                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>product_name</th>
                                <th>section_name</th>
                                <th>created_by</th>
                                <th>updated_by</th>
                                <th>Notes</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->products as $index => $product)
                                <tr wire:key="{{ $product->id }}">
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->section->name }}</td>
                                    <td>{{ $product->created_by }}</td>
                                    <td>{{ $product->updated_by ?? 'no one update it' }}</td>
                                    <td>{{ $product->description ?? 'no description' }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <button wire:click="edit({{ $product->id }})" title="edit" type="button"
                                            data-toggle="modal" data-target="#edit-product"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <button wire:click="targetProductId({{ $product->id }})" title="delete"
                                            type="button" data-toggle="modal" data-target="#deleteModal"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="9">there is no product yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    {{ $this->products->links() }}

</div>
