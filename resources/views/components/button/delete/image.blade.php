@props([
    'action' => '',
    'message' => 'Delete this image?',
    'hideFirst' => false,
])

<form action="{{ $action }}" method="POST" data-delete-form data-message="{{ $message }}"
    data-delete-image="thumbnail" @class([
        'd-none' => $hideFirst,
    ])>
    @csrf
    @method('DELETE')
    <button {{ $attributes->class(['btn btn-outline-danger']) }}>
        Delete image
    </button>
</form>
