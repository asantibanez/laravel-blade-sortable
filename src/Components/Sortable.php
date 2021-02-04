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

    public function render()
    {
        return view('laravel-blade-sortable::components.sortable');
    }
}
