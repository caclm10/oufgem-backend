@props([
    'label' => '',
    'name' => '',
    'errorBag' => 'default',
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea
        {{ $attributes->class(['form-control', 'is-invalid' => $errors->$errorBag->has($name)])->merge([
            'name' => $name,
            'id' => $name,
        ]) }}>{{ $slot }}</textarea>
    @error($name, $errorBag)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
