@props([
    'text' => 'Simpan'
])

<button {{ $attributes->class(['btn btn-primary'])->merge() }}>
    {{$text}}
</button>
