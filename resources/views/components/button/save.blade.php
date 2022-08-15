@props([
    'text' => 'Save',
])

<button {{ $attributes->class(['btn btn-primary'])->merge() }}>
    {{ $text }}
</button>
