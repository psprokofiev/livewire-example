<div class="card">
    <div class="card-body position-relative">
        <div class="lead">Jobs</div>
        <div class="h1 text-primary">{{ $jobs }}</div>

        <div class="lead">Active Jobs</div>
        <div class="h2 text-success">{{ $active_jobs }}</div>

        <div class="position-absolute p-3" style="top:0;right:0;">
            <div class="spinner-border text-primary" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</div>
