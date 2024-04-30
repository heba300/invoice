<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="edit-section" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">edit section</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">section name</label>
                                    <input wire:model="name" type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter name">

                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">description</label>
                                    <textarea wire:model="description" class="form-control" id="exampleInputPassword1" placeholder="enter description"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click.prevent='update' type="submit" class="btn btn-primary">
                        save changes
                    </button>

                    <a href="{{ route('section-list') }}" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>

</div>
