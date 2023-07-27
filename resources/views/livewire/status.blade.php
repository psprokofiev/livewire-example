<div @class(['card', 'bg-success' => $status, 'bg-secondary' => ! $status]) wire:poll.visible>
    <div class="card-body text-center text-white">
        <div class="h1">{{ $status ? 'OK' : 'OFF' }}</div>
        <small>{{ now()->format('H:i:s') }}</small>
    </div>
</div>
