<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class Dashboard extends Component
{
    public int $jobs = 0;

    public int $active_jobs = 0;

    public bool $ready = false;

    protected $listeners = [
        'refresh',
//        'refresh' => 'fetch',
    ];

//    /** Disable for defer load */
//    public function mount()
//    {
//        $this->fetch();
//    }

    public function load()
    {
        $this->ready = true;
    }

    public function fetch()
    {
        sleep(1);

        $this->jobs = Job::query()->count();
        $this->active_jobs = Job::query()->where('active', true)->count();
    }

    public function refresh()
    {
        if (! $this->ready) {
            return;
        }

        $this->fetch();
    }

    public function render()
    {
        if ($this->ready) {
            $this->fetch();
        }

        return view('livewire.dashboard');
    }
}
