<div>
    <x-slot name="conentHeader">
        <x-conent-header title="clients-report" main="Reports" />
    </x-slot>

    <x-alert name="success" />
    <x-alert name="primary" />
    <x-alert name="warning" />
    <x-alert name="danger" />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <select wire:model.live="search" class="custom-select rounded-0 col-3" id="exampleSelectRounded0">
                        <option selected value="">select client</option>
                        @foreach ($this->sections as $section)
                            <option wire:key='{{ $section->id }}' value="{{ $section->id }}">
                                {{ $section->name }}</option>
                        @endforeach
                    </select>

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
                                <th>invoice_number</th>
                                <th>status</th>
                                <th>section_name</th>
                                <th>product</th>
                                <th>amount_collection</th>
                                <th>commission</th>
                                <th>discount</th>
                                <th>rate_vat</th>
                                <th>value_vat</th>
                                <th>total</th>
                                <th>invoice_date</th>
                                <th>due_date</th>
                                <th>created_by</th>
                                <th>updated_by</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->invoices as $index => $invoice)
                                <tr wire:key="{{ $invoice->id }}">
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $invoice->status == 'unpaid_invoice' ? 'bg-danger' : 'bg-success' }}">
                                            {{ $invoice->status }}
                                        </span>
                                    </td>
                                    <td>{{ $invoice->section->name }}</td>
                                    <td>{{ $invoice->product_name }}</td>
                                    <td>{{ $invoice->amount_collection }}</td>
                                    <td>{{ $invoice->commission }}</td>
                                    <td>{{ $invoice->discount ?? 'no discount' }}</td>
                                    <td>{{ $invoice->rate_vat }}</td>
                                    <td>{{ $invoice->value_vat }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ $invoice->total }}
                                        </span>
                                    </td>
                                    <td>{{ $invoice->invoice_date }}</td>
                                    <td>{{ $invoice->due_date }}</td>
                                    <td>{{ $invoice->created_by }}</td>
                                    <td>{{ $invoice->updated_by ?? 'no one update it' }}</td>
                                    <td>{{ $invoice->created_at }}</td>
                                    <td>{{ $invoice->updated_at }}</td>
                                    <td>{{ $invoice->notes }}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="16">Select Client</td>
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

    {{-- {{ $this->invoices->links() }} --}}
</div>
