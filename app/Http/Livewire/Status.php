<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Status extends Component
{
    public bool $status = false;

    public function render()
    {
        $this->status = config('app.status');

        return view('livewire.status');
    }
}
