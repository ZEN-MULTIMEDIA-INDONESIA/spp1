<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    protected $breadcrumb;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->breadcrumb = array_slice(explode('/', request()->url()), 3);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }
}
