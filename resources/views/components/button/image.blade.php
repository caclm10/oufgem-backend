@props([
    'action' => '',
    'target' => '',
])

@php
$id = \Str::random(10);
@endphp

<label for="{{ $id }}"class="btn btn-outline-primary">Change Image</label>

<input type="file" accept="image/*" id="{{ $id }}" class="d-none" data-image-upload
    data-action="{{ $action }}" data-image-target="{{ $target }}">
