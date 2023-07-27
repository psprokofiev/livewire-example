<div>
    <div class="form-group mb-3">
        <input type="search" class="form-control"
               wire:model.debounce.2000ms="search"
               wire:loading.attr="disabled"
               placeholder="Search..." required />
    </div>

    <div class="mb-3 text-end">
        @if($search)
            <span>Searching:</span>
            <i>{{ $search }}</i>, found: {{ $jobs->total() }}
            <a href="#" wire:click="$set('search', '')">Reset</a>
        @else
            <span>Total found: {{ $jobs->total() }}
        @endif
    </div>

    <table class="table table-striped align-middle">
        <tr>
            <th>#</th>
            <th>Title / Content</th>
            <th style="min-width:3rem;">&nbsp;</th>
            <th>Status</th>
        </tr>
        @forelse($jobs as $job)
            @livewire('jobs.index.job', compact('job'), key($job->id))
        @empty
            <tr>
                <td colspan="4" class="text-center">Nothing found</td>
            </tr>
        @endforelse
    </table>

    {{ $jobs->links() }}
</div>
