<?php

namespace App\View\Components\Form\Type;

use Illuminate\View\Component;

class input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;

    public $id;

    public $class;

    public function __construct($name, $id, $class, $type)
    {
        $this->name  = $name;
        $this->id    = $id;
        $this->class = $class;
        $this->type  = $type;
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
