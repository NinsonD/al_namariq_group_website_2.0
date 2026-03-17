<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageUploader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label = 'Upload Image',
        public $value = null,
        public string $btnText = 'Upload',
        public string $resetText = 'Remove',
        public string $sizeClass = '',
        public bool $defaultSize = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image-uploader');
    }
}
