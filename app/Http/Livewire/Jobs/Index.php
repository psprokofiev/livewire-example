<?php

namespace App\Http\Livewire\Jobs;

use App\Concerns\Livewire\WithPagination;
use App\Models\Job;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $jobs = Job::query()
            ->latest('id')
            ->paginate();

        return view(
            view: 'livewire.jobs.index',
            data: compact('jobs')
        );
    }
}
