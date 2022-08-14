@props([
    'label' => '',
    'name' => '',
    'errorBag' => 'default',
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select
        {{ $attributes->class(['form-select', 'is-invalid' => $errors->$errorBag->has($name)])->merge([
            'name' => $name,
            'id' => $name,
        ]) }}>
        {{ $slot }}
    </select>

    @error($name, $errorBag)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
