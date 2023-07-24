<?php

namespace App\Concerns\Livewire;

trait WithPagination
{
    use \Livewire\WithPagination;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
}
