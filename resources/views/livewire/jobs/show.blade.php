<form method="post" wire:submit.prevent="save">
    <div class="card">
        <div class="card-header">
            <div>#{{ $job->id }}</div>
            <div class="lead">{{ $job->title }}</div>
        </div>

        <div class="card-body">

            @if($editing)

                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" wire:model.defer="job.title" required />
                </div>

                <div class="form-group mb-3">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="8" wire:model.defer="job.content" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="switch_active" value="1"
                               wire:model.defer="job.active" />
                        <label class="form-check-label" for="switch_active">Active</label>
                    </div>
                </div>

            @else
                <div class="lead">Active</div>
                <div class="font-weight-bold mb-3">
                    @if($job->active)
                        <div class="text-success">Yes</div>
                    @else
                        <div class="text-danger">No</div>
                    @endif
                </div>

                <div>{{ $job->content }}</div>
            @endif
        </div>

        <div class="card-footer">
            @if($editing)

                <div class="row mt-3 align-items-center">
                    <div class="col"></div>
                    <div class="col-auto">
                        <div class="spinner-border text-primary" role="status" wire:loading>
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" wire:click="$set('editing', true)" class="btn btn-success">
                            <i class="bi bi-save2"></i>
                            <span class="ps-2">Update</span>
                        </button>
                        <button type="button" wire:click="cancel" class="btn btn-secondary">
                            Cancel
                        </button>
                    </div>
                </div>

            @else
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ route('jobs.index') }}" class="btn btn-link">Back</a>
                    </div>
                    <div class="col-auto">
                        <div class="spinner-border text-primary" role="status" wire:loading>
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="button" wire:click="$set('editing', true)" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i>
                            <span class="ps-2">Edit</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</form>
