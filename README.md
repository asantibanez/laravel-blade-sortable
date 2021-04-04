# Laravel Blade Sortable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/asantibanez/laravel-blade-sortable.svg?style=flat-square)](https://packagist.org/packages/asantibanez/laravel-blade-sortable)
[![Total Downloads](https://img.shields.io/packagist/dt/asantibanez/laravel-blade-sortable.svg?style=flat-square)](https://packagist.org/packages/asantibanez/laravel-blade-sortable)

![Laravel Blade Sortable](https://laravel-og.beyondco.de/Laravel%20Blade%20Sortable.png?theme=light&packageManager=composer+require&packageName=asantibanez%2Flaravel-blade-sortable&pattern=architect&style=style_1&description=Custom+Blade+components+to+add+sortable%2Fdrag-and-drop+HTML+elements+in+your+apps&md=1&showWatermark=1&fontSize=100px&images=menu)

## Demo

[Repo](https://github.com/asantibanez/laravel-blade-sortable-demo)

![demo](https://github.com/asantibanez/laravel-blade-sortable/raw/master/demo.gif)

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

The sort order of elements can be used alongside other input fields on form submissions.
To enable this behavior, just pass a `name` prop to a `laravel-blade-sortable::sortable` 
component. The `name` should be the name of the input in your form.
 
```blade
<form>
    <x-laravel-blade-sortable::sortable
        name="sort_order"
    >
        {{-- Items here --}}
    </x-laravel-blade-sortable::sortable>
</form>
```

By adding a `name` props, the component internally adds hidden inputs
for each one of the items' `sort-key`. 

![as-form-input](https://github.com/asantibanez/laravel-blade-sortable/raw/master/examples/as-form-input.gif)

Pretty neat! 👌

### With Livewire

Into Livewire? It's awesome. We know.

You can use this package within your Livewire views and use the 
sorting information in the component.

To get "sort change" updates in your Livewire component, just add the
attribute `wire:onSortOrderChange` to a `x-laravel-blade-sortable::sortable`
component. Adding this attribute will hook the Livewire component when a 
sorting event happens and will call the specified method/callback.

```blade
<x-laravel-blade-sortable::sortable
    name="dropzone"
    wire:onSortOrderChange="handleSortOrderChange"
>
    {{-- Items here --}}
</x-laravel-blade-sortable::sortable>
```

In the example above, every time your items are sorted, the `handleSortOrderChange`
method will be called passing as argument an array with your items' `sort-key` in the
current order.

![livewire](https://github.com/asantibanez/laravel-blade-sortable/raw/master/examples/livewire.gif)

Extra info is passed along too, so you can check extra data when processing the sort order

```php
public function handleOnSortOrderChanged($sortOrder, $previousSortOrder, $name, $from, $to)
{
    // $sortOrder = new keys order
    // $previousSortOrder = keys previous order
    // $name = drop target name
    // $from = name of drop target from where the dragged/sorted item came from
    // $to = name of drop target to where the dragged/sorted item was placed
}
```

### Customization

To support some advanced features of SortableJs, it is possible to pass the following
props to a `laravel-blade-sortable::sortable` component:
- `animation`: milliseconds it takes to run the sorting animation. `150` is the default value.
- `ghost-class`: class added to the dragged object during sort. Default is `null`. Must be 1 class only.
- `drag-handle`: class name that will be used as the handle for dragging. Only the DOM element that has that class can enable sorting.

```blade
<x-laravel-blade-sortable::sortable
    animation="1000"
    ghost-class="opacity-25"
    drag-handle="drag-handle"
>
    {{-- Items here --}}
</x-laravel-blade-sortable::sortable>
```

![customization](https://github.com/asantibanez/laravel-blade-sortable/raw/master/examples/customization.gif)

### Multiple Drop Zones

Wanting to have different drop zones to drag/drop/sort elements? We have you covered. 😎

Just add a `group` string prop to a `laravel-blade-sortable::sortable` component. Add the same prop to another
`laravel-blade-sortable::sortable` component on the same page and BOOM! Done!

```blade
<x-laravel-blade-sortable::sortable
    group="people"
>
    {{-- Items here --}}
</x-laravel-blade-sortable::sortable>

<x-laravel-blade-sortable::sortable
    group="people"
>
    {{-- Items here --}}
</x-laravel-blade-sortable::sortable>
```

![drag-drop](https://github.com/asantibanez/laravel-blade-sortable/raw/master/examples/drag-drop.gif)

### Enable/Disable sorting and/or drop

Use `:allow-sort=true|false` and `:allow-drop=true|false` to `x-laravel-blade-sortable::sortable` components
to enable/disable sorting and/or drop of elements.

Both defaults to `true`.

```blade
<x-laravel-blade-sortable::sortable
    group="people"
    :allow-sort="false"
    :allow-drop="false"
>
    {{-- Items here --}}
</x-laravel-blade-sortable::sortable>
```

![disable-sort-drop](https://github.com/asantibanez/laravel-blade-sortable/raw/master/examples/disable-sort-drop.gif)

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
