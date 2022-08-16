@props([
    'label' => '',
    'name' => '',
    'errorBag' => 'default',
    'defaultValue' => '',
    'noMargin' => false,
])

<div @class(['form-group', 'mb-0' => $noMargin])>
    @if ($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <input
        {{ $attributes->class(['form-control', 'is-invalid' => $errors->$errorBag->has($name)])->merge([
            'name' => $name,
            'id' => $name,
            'type' => 'text',
            'value' => old($name, $defaultValue),
        ]) }}>
    @error($name, $errorBag)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
