<div class="card mb-3" wire:init="load">
    <div class="card-body position-relative">
        <div class="position-absolute p-3" style="top:0;right:0;">
            <div class="spinner-border text-primary" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        @if($ready)
            <div class="lead">Jobs</div>
            <div class="h1 text-primary">{{ $jobs }}</div>

            <div class="lead">Active Jobs</div>
            <div class="h2 text-success">{{ $active_jobs }}</div>
        @else
            <br /><br /><br />
        @endif
    </div>
</div>
