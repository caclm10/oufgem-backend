@props([
    'spoof' => 'POST',
])

<form {{ $attributes->merge([
    'method' => 'POST',
]) }}>
    @csrf
    @if (str($spoof)->lower() != 'post')
        @method(str($spoof)->upper())
    @endif

    {{ $slot }}
</form>
