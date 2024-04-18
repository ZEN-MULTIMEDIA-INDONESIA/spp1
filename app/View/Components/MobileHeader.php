<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MobileHeader extends Component
{
    protected $menus;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = [
            [
                'name' => 'Dashboard',
                'icon' => '<i class="fas fa-tachometer-alt mr-3"></i>',
                'slugName' => 'dashboard',
                'url' => '#',
                'access' => ['pm', 'klien']
            ],
            [
                'name' => 'Klien',
                'icon' => '<i class="fas fa-users mr-3"></i>',
                'slugName' => 'klien',
                'url' => '#',
                'access' => ['pm', 'klien']
            ],
            [
                'name' => 'Proyek',
                'icon' => '<i class="fa-solid fa-file-lines mr-3"></i>',
                'slugName' => 'proyek',
                'url' => '#',
                'access' => ['pm', 'klien']
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('partials._mobile-header', [
            'menus' => $this->menus
        ]);
    }
}
