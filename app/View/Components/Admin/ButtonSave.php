<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonSave extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $class = '', public $text = null, public string $variant = 'success', public $style = null, public $icon = true)
    {
        $this->text = $text ?? __('admin.save');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.button-save');
    }
}
