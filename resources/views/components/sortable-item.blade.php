@if($as)
    <{{ $as }} {{ $attributes }}>
        {{ $slot }}
    </{{ $as }}>
@endif

@if($component)
    <x-dynamic-component :component="$component" {{ $attributes }}>
        {{ $slot }}
    </x-dynamic-component>
@endif
