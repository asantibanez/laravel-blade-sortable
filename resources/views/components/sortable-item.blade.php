@if(!$component)
    <{{ $as ?? 'div' }}
        {{ $attributes }}
        data-sort-key="{{ $sortKey }}"
    >
        {{ $slot }}
    </{{ $as ?? 'div' }}>
@endif

@if($component)
    <x-dynamic-component :component="$component" {{ $attributes }} data-sort-key="{{ $sortKey }}">
        {{ $slot }}
    </x-dynamic-component>
@endif
