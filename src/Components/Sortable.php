<?php


namespace Asantibanez\LaravelBladeSortable\Components;


use Illuminate\View\Component;

class Sortable extends Component
{
    public $as;

    public $component;

    public $name;

    public $animation;

    public $ghostClass;

    public function __construct($as = null,
                                $component = null,
                                $name = null,
                                $animation = 150,
                                $ghostClass = '')
    {
        $this->as = $as;
        $this->component = $component;
        $this->name = $name;
        $this->animation = $animation;
        $this->ghostClass = $ghostClass;
    }

    public function xInit()
    {
        $wireOnSortOrderChange = $this->attributes->whereStartsWith('wire:onSortOrderChange')->first();

        $hasWireOnSortOrderChangeDirective = $wireOnSortOrderChange !== null;

        return collect()
            ->push("animation = {$this->animation}")
            ->push("ghostClass = '{$this->ghostClass}'")
            ->push($hasWireOnSortOrderChangeDirective ? 'wireComponent = $wire' : null)
            ->push($hasWireOnSortOrderChangeDirective ? "wireOnSortOrderChange = '$wireOnSortOrderChange'" : null)
            ->push('init()')
            ->filter(function ($line) {
                return $line !== null;
            })
            ->join('; ');
    }

    public function render()
    {
        return view('laravel-blade-sortable::components.sortable');
    }
}
