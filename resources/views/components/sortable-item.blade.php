@if(!$component)
    <{{ $as ?? 'div' }} {{ $attributes }}>
        {{ $slot }}
    </{{ $as ?? 'div' }}>
@endif

@if($component)
    <x-dynamic-component :component="$component" {{ $attributes }}>
        {{ $slot }}
    </x-dynamic-component>
@endif
