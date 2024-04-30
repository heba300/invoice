<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="user-create" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">add section</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data">

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <input wire:model="name" type="text" class="form-control"
                                        placeholder="Full name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>

                                    </div>
                                </div>

                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="input-group mb-3">
                                    <input wire:model="email" type="email" class="form-control" placeholder="Email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>

                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="input-group mb-3">
                                    <input wire:model="password" type="password" class="form-control"
                                        placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>

                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="input-group mb-3">
                                    <input wire:model='password_confirmation' type="password" class="form-control"
                                        placeholder="Retype password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <select wire:model="role" class="custom-select rounded-0"
                                        id="exampleSelectRounded0">
                                        <option selected value="">select role</option>
                                        @foreach ($this->allRoles as $role)
                                            <option wire:key="{{ $role->id }}" value="{{ $role->name }}">
                                                {{ $role->name }} </option>
                                        @endforeach
                                    </select>

                                    @error('role')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="input-group mb-3">
                                    <input wire:model="image" type="file" class="form-control" placeholder="image"
                                        accept="image/*">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-image"></span>
                                        </div>
                                    </div>
                                </div>
                                @if ($image)
                                    <div class="image w-25 mb-2">
                                        <img src="{{ $image->temporaryUrl() }}" class="img-circle elevation-2 w-50"
                                            alt="User Image">
                                    </div>
                                @endif
                            </div>


                            <!-- /.col -->

                            <!-- /.col -->

                        </form>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-4 ml-2">
                        <button wire:click.prevent='register' type="submit" class="btn btn-success btn-block">create
                            User</button>
                    </div>
                    <a href="{{ route('users-list') }}" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>

</div>
