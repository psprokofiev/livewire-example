<?php

namespace App\Http\Livewire\Jobs\Index;

use Livewire\Component;

class Job extends Component
{
    public \App\Models\Job $job;

    protected array $rules = [
        'job.active' => [
            'required',
            'boolean',
        ],
    ];

    public function updatedJobActive()
    {
        $this->job->save();
        $this->emitTo('dashboard', 'refresh');
    }

    public function render()
    {
        return view('livewire.jobs.index.job');
    }
}
