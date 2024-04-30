<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="invoice-create" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">add Invoice</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="form-group col-4">
                                        <label for="exampleInputEmail1">invoice
                                            number</label>
                                        <input wire:model="invoice_number" type="text" class="form-control"
                                            id="exampleInputEmail1" placeholder="invoice number">
                                        @error('invoice_number')
                                            <span class="text-red mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label>invoice_date</label>
                                        <div class="input-group date" id="invoice_date">
                                            <input wire:model="invoice_date" type="date" class="form-control "
                                                placeholder="invoice_date">
                                        </div>
                                        @error('invoice_date')
                                            <span class="text-red mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label>due_date</label>
                                        <div class="input-group date" id="due_date">
                                            <input wire:model="due_date" type="date" class="form-control "
                                                placeholder="due_date">
                                        </div>
                                        @error('due_date')
                                            <span class="text-red mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-group col-4">
                                        <label for="exampleSelectRounded0">select section</label>
                                        <select wire:model.live="section_id" class="custom-select rounded-0"
                                            id="exampleSelectRounded0">
                                            <option selected value="">select section</option>
                                            @foreach ($this->sections as $section)
                                                <option wire:key='{{ $section->id }}' value="{{ $section->id }}">
                                                    {{ $section->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('section_id')
                                            <span class="text-red mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="exampleSelectRounded1">select product</label>
                                        <select wire:model.live="product_name" class="custom-select rounded-0"
                                            id="exampleSelectRounded1">
                                            <option selected value="">select product</option>
                                            @foreach ($this->products as $product)
                                                <option value="{{ $product->name }}"> {{ $product->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('product_name')
                                            <span class="text-red mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="amount_collection">amount_collection</label>
                                        <input wire:model="amount_collection" type="number" class="form-control"
                                            id="amount_collection" placeholder="amount collection" min="0"
                                            step=".1">
                                        @error('amount_collection')
                                            <span class="text-red mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="form-group col-4">
                                        <label for="commission">commission</label>
                                        <input wire:model.live="commission" type="number" class="form-control"
                                            min="0" step=".1" id="commission" placeholder="commission">
                                        @error('commission')
                                            <span class="text-red mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="discount">discount</label>
                                        <input wire:model.live="discount" type="number" class="form-control"
                                            id="discount" min="0" step=".1" placeholder="discount">
                                        @error('discount')
                                            <span class="text-red mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="rate_vat">select rate_vat</label>
                                        <select wire:model.live="rate_vat" class="custom-select rounded-0"
                                            id="rate_vat">
                                            <option value="">select rate_vat</option>
                                            <option value="5">5%</option>
                                            <option value="10">10%</option>
                                            <option value="14">14%</option>
                                        </select>
                                        @error('rate_vat')
                                            <span class="text-red mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-group col-6">
                                        <label for="value_vat">value_vat</label>
                                        <input wire:model.live="value_vat" type="text" class="form-control"
                                            id="value_vat" placeholder="value_vat" disabled>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="total">total</label>
                                        <input wire:model.live="total" type="text" class="form-control"
                                            id="total" placeholder="total" disabled>
                                    </div>

                                </div>

                                <div class="form-group col-12">
                                    <label for="notes">notes</label>
                                    <textarea wire:model="notes" type="text" class="form-control" id="notes" placeholder="notes"></textarea>
                                    @error('notes')
                                        <span class="text-red mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button wire:click.prevent="create" type="submit" class="btn btn-success">
                            create Invoice
                        </button>
                    </div>
                    <a href="{{ route('invoice-list') }}" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>

</div>
