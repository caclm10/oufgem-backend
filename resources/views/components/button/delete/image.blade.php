@props([
    'action' => '',
    'message' => 'Delete this image?',
    'hideFirst' => false,
])

<form action="{{ $action }}" method="POST" data-delete-form data-message="{{ $message }}"
    data-delete-image="thumbnail">
    @csrf
    @method('DELETE')
    <button {{ $attributes->class(['btn btn-outline-danger', 'd-none' => $hideFirst]) }}>
        Delete image
    </button>
</form>
