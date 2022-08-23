<?php

namespace App\View\Components\Form\Type;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;

    public $id;

    public $class;

    public function __construct($name, $id, $class)
    {
        $this->name  = $name;
        $this->id    = $id;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.type.input');
    }
}
