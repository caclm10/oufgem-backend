@props([
    'label' => '',
    'name' => '',
    'errorBag' => 'default',
    'checked' => false,
])

<div class="form-check">
    <div class="checkbox">
        <input
            {{ $attributes->class(['form-check-input', 'is-invalid' => $errors->$errorBag->has($name)])->merge([
                'name' => $name,
                'id' => $name,
                'type' => 'checkbox',
            ]) }}
            @if ($checked) checked @endif>
        <label for="{{ $name }}">{{ $label }}</label>

        @error($name, $errorBag)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
