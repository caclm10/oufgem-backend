@props([
    'href' => '#',
    'icon' => 'plus',
    'title' => '',
])

<a href="{{ $href }}" class="btn btn-primary icon icon-left">
    <i class="bi bi-{{ $icon }}"></i>
    {{ $title }}
</a>
