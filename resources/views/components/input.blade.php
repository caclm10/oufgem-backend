@props([
    'label' => '',
    'name' => '',
    'errorBag' => 'default',
    'defaultValue' => '',
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
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
