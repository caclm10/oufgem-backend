@props([
    'action' => '',
    'message' => '',
])

<form action="{{ $action }}" method="POST" data-delete-form data-message="{{ $message }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-outline-danger icon">
        <i class="bi bi-trash3"></i>
    </button>
</form>
