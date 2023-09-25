<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class NavigateButton extends Component
{
    public $router;

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function render():View
    {
        return view('components.navigate-button');
    }
}
