<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableView extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $route, public $title = 'View', public $target = null)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.view');
    }
}
