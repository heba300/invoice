<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="invoice-report" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Invoice
                                    <small class="float-right">invoice_date: {{ $invoice->invoice_date ?? '' }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>invoice_number</th>
                                            <th>Section_name</th>
                                            <th>Product_name</th>
                                            <th>Notes</th>
                                            <th>Amount_collection</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $invoice->invoice_number ?? '' }}</td>
                                            <td>{{ $invoice->section->name ?? '' }}</td>
                                            <td>{{ $invoice->product_name ?? '' }}</td>
                                            <td>{{ $invoice->notes ?? 'no notes' }}</td>
                                            <td>${{ $invoice->amount_collection ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="../../dist/img/credit/visa.png" alt="Visa">
                                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                    handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p>

                                <button wire:click='changeStatus' type="button"
                                    class="btn {{ ($invoice->status ?? '') == 'paid_invoice' ? 'btn-danger' : 'btn-success' }}">
                                    {{ ($invoice->status ?? '') == 'paid_invoice' ? 'change to unpaid_invoice' : 'change to paid_invoice' }}
                                </button>

                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">due_date {{ $invoice->due_date ?? '' }}</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">commission:</th>
                                                <td>${{ $invoice->commission ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>discount:</th>
                                                <td>${{ $invoice->discount ?? 'no discount' }}</td>
                                            </tr>
                                            <tr>
                                                <th>rate_vat({{ $invoice->rate_vat ?? '' }}%) / value_vat:</th>
                                                <td>${{ $invoice->value_vat ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>status:</th>
                                                <td>{{ $invoice->status ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>${{ $invoice->total ?? '' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button wire:click.prevent="create" type="submit" class="btn btn-success">Save changes</button> --}}
                    <a href="{{ route('invoices-reports') }}" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>

</div>
