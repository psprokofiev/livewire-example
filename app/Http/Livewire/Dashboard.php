<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class Dashboard extends Component
{
    public int $jobs = 0;

    public int $active_jobs = 0;

    protected $listeners = [
        'refresh',
//        'refresh' => 'fetch',
    ];

    public function mount()
    {
        $this->fetch();
    }

    public function fetch()
    {
        $this->jobs = Job::query()->count();
        $this->active_jobs = Job::query()->where('active', true)->count();
    }

    public function refresh()
    {
        $this->fetch();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
