@props([
    'title' => '',
    'spacing' => '1rem',
])

<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="card-title">{{ $title }}</h4>

    <div class="d-flex space-x" style="--sx: {{ $spacing }}">
        {{ $slot }}
    </div>
</div>
