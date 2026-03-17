<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSwitch extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name, 
        public bool $checked = false, 
        public string $label = '', 
        public ?string $id = null, 
        public string $class = ''
    )
    {
        $this->id = $id ?? $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-switch');
    }
}
