<div>
    <x-slot name="conentHeader">
        <x-conent-header title="arhcived-invoices" main="Invoices" />
    </x-slot>

    <x-alert name="success" />
    <x-alert name="primary" />
    <x-alert name="warning" />
    <x-alert name="danger" />

    @include('components.delete-modal', ['itemName' => 'invoice'])
    @include('components.update-modal', ['itemName' => 'invoice', 'title' => 'restore'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

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
                                <th>section_name</th>
                                <th>product</th>
                                <th>value_vat</th>
                                <th>total</th>
                                <th>created_by</th>
                                <th>updated_by</th>
                                <th>status</th>
                                <th>notes</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->invoices as $index => $invoice)
                                <tr wire:key="{{ $invoice->id }}">
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->section->name }}</td>
                                    <td>{{ $invoice->product_name }}</td>
                                    <td>{{ (int) $invoice->value_vat }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ (int) $invoice->total }}
                                        </span>
                                    </td>
                                    <td>{{ $invoice->created_by }}</td>
                                    <td>{{ $invoice->updated_by ?? 'no one update it' }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $invoice->status == 'unpaid_invoice' ? 'bg-danger' : 'bg-success' }}">
                                            {{ $invoice->status }}
                                        </span>
                                    </td>

                                    <td>{{ $invoice->notes }}</td>
                                    <td>
                                        <button wire:click="targetInvoiceId({{ $invoice->id }})" title="delete"
                                            type="button" data-toggle="modal" data-target="#updateModal"
                                            class="btn btn-primary btn-sm">
                                            restore invoice
                                        </button>

                                        <button wire:click="targetInvoiceId({{ $invoice->id }})" title="delete"
                                            type="button" data-toggle="modal" data-target="#deleteModal"
                                            class="btn btn-danger btn-sm">
                                            delete invoice
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="9">there is no invoice yet</td>
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

    {{ $this->invoices->links() }}
</div>
