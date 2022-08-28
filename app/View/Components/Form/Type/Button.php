<?php

namespace App\View\Components\Form\Type;

use Illuminate\View\Component;

class button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;

    public $class;

    public $value;

    public function __construct($type, $class, $value)
    {
        $this->type  = $type;
        $this->class = $class;
        $this->value = $value;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.type.button');
    }
}
