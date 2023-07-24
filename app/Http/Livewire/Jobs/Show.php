<?php

namespace App\Http\Livewire\Jobs;

use App\Models\Job;
use Livewire\Component;

class Show extends Component
{
    public Job $job;

    public bool $editing = false;

    protected array $rules = [
        'job.active' => [
            'required',
            'boolean',
        ],

        'job.title' => [
            'required',
            'string',
        ],

        'job.content' => [
            'required',
            'string',
        ],
    ];

    public function save()
    {
        $this->validate();
        $this->job->save();

        $this->reset('editing');
    }

    public function cancel()
    {
        $this->job->refresh();
        $this->reset('editing');
    }

    public function updatedJob()
    {
        $this->job->save();
    }

    public function render()
    {
        return view('livewire.jobs.show');
    }
}
