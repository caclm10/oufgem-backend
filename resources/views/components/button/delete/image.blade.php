@props([
    'action' => '',
    'message' => 'Delete this image?',
])

<form action="{{ $action }}" method="POST" data-delete-form data-message="{{ $message }}">
    @csrf
    @method('DELETE')
    <button {{ $attributes->class(['btn btn-outline-danger']) }}>
        Delete image
    </button>
</form>
