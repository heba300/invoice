<div>
    <x-slot name="conentHeader">
        <x-conent-header title="users-list" main="Users" />
    </x-slot>

    <x-alert name="success" />
    <x-alert name="primary" />
    <x-alert name="warning" />
    <x-alert name="danger" />

    <livewire:users.create-user />

    @include('components.delete-modal', ['itemName' => 'user', 'title' => 'delete user'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#user-create">
                        add new user
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
                                <th>user_name</th>
                                <th>user_email</th>
                                <th>role</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->allUsers as $index => $user)
                                <tr wire:key='{{ $user->id }}'>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @foreach ($user->roles as $role)
                                        <td>
                                            <span
                                                class="badge {{ $role->name == 'admin' ? 'bg-primary' : 'bg-success' }}">
                                                {{ $role->name }}
                                            </span>
                                        </td>
                                        @if ($role->name != 'admin')
                                            <td>
                                                <button wire:click="targetUserId({{ $user->id }})" title="delete"
                                                    type="button" data-toggle="modal" data-target="#deleteModal"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        @else
                                            <td>
                                                no action
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

</div>
