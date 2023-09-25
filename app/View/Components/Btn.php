<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Btn extends Component
{
    public $label;
    public $isLink;
    public $url;

    public function __construct($label, $isLink = false, $url = '#')
    {
        $this->label = $label;
        $this->isLink = $isLink;
        $this->url = $url;
    }

    public function render()
    {
        return view('components.btn');
    }
}
