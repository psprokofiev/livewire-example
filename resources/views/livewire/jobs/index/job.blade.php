<tr>
    <td>{{ $job->id }}</td>
    <td>
        <a href="{{ route('jobs.show', compact('job')) }}">{{ $job->title }}</a>
        <div class="small">{{ Str::limit($job->content, 200) }}</div>
    </td>
    <td>
        <div class="spinner-border text-primary" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </td>
    <td>
        <div class="form-check form-switch d-flex justify-content-center">
            <input class="form-check-input" type="checkbox" role="switch" id="switch_{{ $job->id }}" value="1" wire:model="job.active" />
            <label class="form-check-label" for="switch_{{ $job->id }}"></label>
        </div>
    </td>
</tr>
