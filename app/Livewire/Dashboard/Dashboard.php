<?php

namespace App\Livewire\Dashboard;


use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('dashBoard')]
class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
