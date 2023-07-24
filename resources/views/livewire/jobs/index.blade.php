<div>
    <table class="table table-striped align-middle">
        <tr>
            <th>#</th>
            <th>Title / Content</th>
            <th style="min-width:3rem;">&nbsp;</th>
            <th>Status</th>
        </tr>
        @foreach($jobs as $job)
            @livewire('jobs.index.job', compact('job'), key($job->id))
        @endforeach
    </table>

    {{ $jobs->links() }}
</div>
