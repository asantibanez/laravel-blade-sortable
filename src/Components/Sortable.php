<?php


namespace Asantibanez\LaravelBladeSortable\Components;


use Illuminate\View\Component;

class Sortable extends Component
{
    public $as;

    public $component;

    public $name;

    public function __construct($as = null, $component = null, $name = null)
    {
        $this->as = $as;
        $this->component = $component;
        $this->name = $name;
    }

    public function xInit()
    {
        $wireOnSortOrderChange = $this->attributes->whereStartsWith('wire:onSortOrderChange')->first();

        $hasWireOnSortOrderChangeDirective = $wireOnSortOrderChange !== null;

        return collect()
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
