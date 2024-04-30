<div>
    <x-slot name="conentHeader">
        <x-conent-header title="paid-invoices" main="Invoices" />
    </x-slot>

    <x-alert name="success" />
    <x-alert name="primary" />
    <x-alert name="warning" />
    <x-alert name="danger" />

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
                                <th>total</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->paidInvoice as $index => $invoice)
                                <tr wire:key="{{ $invoice->id }}">
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->section->name }}</td>
                                    <td>{{ $invoice->product_name }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ (int) $invoice->total }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $invoice->status == 'unpaid_invoice' ? 'bg-danger' : 'bg-success' }}">{{ $invoice->status }}
                                        </span>
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

    {{ $this->paidInvoice->links() }}
</div>
