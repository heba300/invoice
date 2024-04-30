@props(['name'])

@if (session($name))
    <div class="alert alert-{{ $name }} alert-dismissible fade show" role="alert">
        <strong>Note:</strong> <span class="text-white">{{ session()->get($name) }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
