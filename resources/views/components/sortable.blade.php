@if(!$component)
    <{{ $as ?? 'div' }}
        {{ $attributes }}
        data-name="{{ $name }}"
        x-data="{ ...laravelBladeSortable() }"
        x-init="{!! $xInit() !!}"
        x-ref="root"
    >
        @include('laravel-blade-sortable::includes.hidden-inputs')
        {{ $slot }}
    </{{ $as ?? 'div' }}>
@endif

@if($component)
    <x-dynamic-component
        :component="$component"
        {{ $attributes }}
        data-name="{{ $name }}"
        x-data="{ ...laravelBladeSortable() }"
        x-init="{!! $xInit() !!}"
        x-ref="root"
    >
        @include('laravel-blade-sortable::includes.hidden-inputs')
        {{ $slot }}
    </x-dynamic-component>
@endif
