<?php

namespace App\Http\Livewire\Band;

use Livewire\Component;

class Success extends Component
{
    public function close(){
        return redirect('/band');
    }

    public function render()
    {
        return view('livewire.band.success');
    }
}
