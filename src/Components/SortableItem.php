<?php


namespace Asantibanez\LaravelBladeSortable\Components;


use Illuminate\View\Component;

class SortableItem extends Component
{
    public $as;

    public $component;

    public function __construct($as = null, $component = null)
    {
        $this->as = $as;
        $this->component = $component;
    }

    public function render()
    {
        return view('laravel-blade-sortable::components.sortable-item');
    }
}
