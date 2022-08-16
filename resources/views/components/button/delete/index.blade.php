@props([
    'action' => '',
    'message' => '',
    'formClass' => '',
    'outline' => true,
    'sm' => false,
    'circle' => false,
])

<form action="{{ $action }}" method="POST" data-delete-form data-message="{{ $message }}"
    @class([$formClass])>
    @csrf
    @method('DELETE')
    <button @class([
        'btn icon',
        'btn-sm' => $sm,
        'btn-outline-danger' => $outline,
        'btn-danger' => !$outline,
        'rounded-circle' => $circle,
    ])>
        <i class="bi bi-trash3"></i>
    </button>
</form>
