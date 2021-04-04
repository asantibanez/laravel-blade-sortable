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

    public $dragHandle;

    public $group;

    public $allowDrop;

    public $allowSort;

    public function __construct($as = null,
                                $component = null,
                                $name = null,
                                $animation = 150,
                                $ghostClass = '',
                                $dragHandle = null,
                                $group = null,
                                $allowSort = true,
                                $allowDrop = true)
    {
        $this->as = $as;
        $this->component = $component;
        $this->name = $name;
        $this->animation = $animation;
        $this->ghostClass = $ghostClass;
        $this->dragHandle = $dragHandle;
        $this->group = $group;
        $this->allowDrop = $allowDrop;
        $this->allowSort = $allowSort;
    }

    public function xInit()
    {
        $wireOnSortOrderChange = $this->attributes->whereStartsWith('wire:onSortOrderChange')->first();

        $hasWireOnSortOrderChangeDirective = $wireOnSortOrderChange !== null;

        $hasDragHandle = $this->dragHandle !== null;

        $hasGroup = $this->group !== null;

        return collect()
            ->push("name = '{$this->name}'")
            ->push("animation = {$this->animation}")
            ->push("ghostClass = '{$this->ghostClass}'")
            ->push($hasDragHandle ? "dragHandle = '.{$this->dragHandle}'" : null)
            ->push($hasGroup ? "group = '{$this->group}'" : null)
            ->push($hasWireOnSortOrderChangeDirective ? 'wireComponent = $wire' : null)
            ->push($hasWireOnSortOrderChangeDirective ? "wireOnSortOrderChange = '$wireOnSortOrderChange'" : null)
            ->push($this->allowSort ? 'allowSort = true' : 'allowSort = false')
            ->push($this->allowDrop ? 'allowDrop = true' : 'allowDrop = false')
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
