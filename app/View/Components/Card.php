<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    //passing data to the component
    public $title;
    public $type;
    public function __construct($title, $type = '')
    {
        $this->title = $title;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.card');
    }
}
