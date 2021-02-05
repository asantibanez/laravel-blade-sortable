# Laravel Blade Sortable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/asantibanez/laravel-blade-sortable.svg?style=flat-square)](https://packagist.org/packages/asantibanez/laravel-blade-sortable)
[![Total Downloads](https://img.shields.io/packagist/dt/asantibanez/laravel-blade-sortable.svg?style=flat-square)](https://packagist.org/packages/asantibanez/laravel-blade-sortable)

Custom Blade components to add sortable/drag-and-drop HTML elements in your apps.

## Installation

You can install the package via composer:

```bash
composer require asantibanez/laravel-blade-sortable
```

After the package is installed, make sure to add `laravel-blade-sortable::scripts`
components next to your other scripts.

```html
<x-laravel-blade-sortable::scripts/>
<script src="/js/app.js"></script>
```

## Requirements

Package requires `SortableJs` and `AlpineJs` to be installed
in your application in order to enable sorting. Reach out
to their respective documentation in order to set them up.

> NOTE: `SortableJs` must be available at the `window` object level in Javascript.
> To do this, import the library using
> 
> `window.Sortable = require('sortablejs').default`
> 
> or use any other similar approach

## Usage

The package provides 2 custom Blade components to enable sorting of DOM elements: 
- `laravel-blade-sortable::sortable` 
- `laravel-blade-sortable::sortable-item`

### Sortable

`laravel-blade-sortable::sortable` is used as the wrapper element for your sortable/drag-and-drop
items. It must be used to enclose the children it will enable sortable.

```blade
<x-laravel-blade-sortable::sortable>
    {{-- Items here --}}
</x-laravel-blade-sortable::sortable>
```

By default, the component renders a "div" as the wrapper node. You can
customize this behavior by passing an `as` property to render 
the type of node you need.

```blade
<x-laravel-blade-sortable::sortable
    as="ul" {{-- Will render an unordered list wrapper node --}}
>
    {{-- Items here --}}
</x-laravel-blade-sortable::sortable>
```

>NOTE: Any other attribute you pass along (class, id, alt, etc) will be 
> added to the element

If you would like to use custom Blade component as a wrapper node, 
you can also do this by passing a `component` property.

```blade
<x-laravel-blade-sortable::sortable
    component="custom-blade-component" {{-- Will render "x-custom-blade-component" --}}
>
    {{-- Items here --}}
</x-laravel-blade-sortable::sortable>
```

### Sortable Item

`laravel-blade-sortable::sortable-item` is used as the wrapper element for 
each item you want to enable sorting.

```blade
<x-laravel-blade-sortable::sortable>
    <x-laravel-blade-sortable::sortable-item sort-key="jason">
        Jason
    </x-laravel-blade-sortable::sortable-item>
    <x-laravel-blade-sortable::sortable-item sort-key="andres">
        Andres
    </x-laravel-blade-sortable::sortable-item>
    <x-laravel-blade-sortable::sortable-item sort-key="matt">
        Matt
    </x-laravel-blade-sortable::sortable-item>
    <x-laravel-blade-sortable::sortable-item sort-key="james">
        James
    </x-laravel-blade-sortable::sortable-item>
</x-laravel-blade-sortable::sortable>
```

> NOTE: Similar to `laravel-blade-sortable::sortable`, you can pass a `as`
> or `component` property to render the type of node or custom component you
> desire.
>
> NOTE: Extra attributes like class, id, alt, etc can be passed along to
> and will be added to the item node.

As you may have noticed, every `laravel-blade-sortable::sortable-item` 
requires a `sort-key` property. This property will be used to keep
track of the ordering of the elements. Should be unique too.

And that's it. You have now a sortable list rendered by Laravel Blade
without any custom Javascript. 🔥

![basic](https://github.com/asantibanez/laravel-blade-sortable/raw/master/examples/basic.gif)

That example looks awful though 😅. Because you can pass in any custom component or styling directly,
you can customize the wrapper and item nodes according to your needs. Here's another example using
TailwindCSS ❤️ and custom components

![custom-component](https://github.com/asantibanez/laravel-blade-sortable/raw/master/examples/custom-component.gif)

Looks dope, right? 👌

## Advanced Usage

### As Form Input

WIP

### With Livewire

WIP

### Customization

WIP

### Multiple Drop Zones

WIP

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email santibanez.andres@gmail.com instead of using the issue tracker.

## Credits

- [Andrés Santibáñez](https://github.com/asantibanez)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
