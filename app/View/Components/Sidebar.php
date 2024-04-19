<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
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
                'url' => 'dashboard',
                'access' => ['0', '4']
            ],
            [
                'name' => 'Klien',
                'icon' => '<i class="fas fa-users mr-3"></i>',
                'slugName' => 'klien',
                'url' => 'klien',
                'access' => ['0', '4']
            ],
            [
                'name' => 'Pengguna',
                'icon' => '<i class="fas fa-users mr-3"></i>',
                'slugName' => 'pengguna',
                'url' => 'pengguna',
                'access' => ['0']
            ],
            [
                'name' => 'Proyek',
                'icon' => '<i class="fa-solid fa-file-lines mr-3"></i>',
                'slugName' => 'proyek',
                'url' => 'proyek',
                'access' => ['0', '4']
            ],
            [
                'name' => 'Task',
                'icon' => '<i class="fa-solid fa-list-check mr-3"></i>',
                'slugName' => 'task',
                'url' => 'task',
                'access' => ['0']
            ],
            [
                'name' => 'Review Rating',
                'icon' => '<i class="fa-solid fa-star mr-3"></i>',
                'slugName' => 'review-rating',
                'url' => 'review-rating',
                'access' => ['0', '1', '2', '3']
            ],
            [
                'name' => 'Pemantauan Proyek',
                'icon' => '<i class="fa-solid fa-magnifying-glass mr-3"></i>',
                'slugName' => 'pemantauan-proyek',
                'url' => 'pemantauan-proyek',
                'access' => ['0', '4']
            ],
            [
                'name' => 'Profile',
                'icon' => '<i class="fa-solid fa-user mr-3"></i>',
                'slugName' => 'profile',
                'url' => 'profile',
                'access' => ['0', '1', '2', '3', '4']
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('partials._sidebar', [
            'menus' => $this->menus
        ]);
    }
}
