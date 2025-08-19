<?php

namespace App\Http\Livewire;
use Symfony\Component\HttpFoundation\Session\Session;

use Livewire\Component;

class ThankyouComponent extends Component
{
    public function render()
    {
        $session = new Session();
        $session->clear();
        return view('livewire.thankyou-component');
    }
}
