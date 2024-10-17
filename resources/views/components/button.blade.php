@props(['route'])

<a href="{{ route($route) }}">
    <button {{ $attributes->merge(['class' => 'btn-success']) }}>
        {{ $slot }}
    </button>
</a>