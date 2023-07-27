<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{
    public function asId(int $id): void
    {
        $job = Job::query()->findOrFail($id);
        dd($job);
    }

    public function asModel(Job $job): void
    {
        dd($job);
    }

    public function asTitle(Job $job): void
    {
        dd($job);
    }

    public function foo(): void
    {
        $failed = true;
        if ($failed) {
            throw ValidationException::withMessages([
                'your-var' => 'Error message',
            ]);
        }
    }
}
