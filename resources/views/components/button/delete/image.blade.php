@props([
    'action' => '',
    'message' => 'Hapus gambar ini?',
])

<form action="{{ $action }}" method="POST" data-delete-form data-message="{{ $message }}">
    @csrf
    @method('DELETE')
    <button {{ $attributes->class(['btn btn-outline-danger']) }}>
        Hapus Gambar
    </button>
</form>
