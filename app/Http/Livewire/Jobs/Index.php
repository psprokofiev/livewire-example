<?php

namespace App\Http\Livewire\Jobs;

use App\Concerns\Livewire\WithPagination;
use App\Models\Job;
use Illuminate\Contracts\Database\Query\Builder;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'page'   => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jobs = Job::query()
            ->when($this->search, function (Builder $query): void {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('content', 'like', "%{$this->search}%");
            })
            ->latest('id')
            ->paginate();

        return view(
            view: 'livewire.jobs.index',
            data: compact('jobs')
        );
    }
}
