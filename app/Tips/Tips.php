<?php

namespace App\Tips;

use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Throwable;

class Tips
{
    public function collections(): void
    {
        $jobs = Job::query()->limit(100)->get();

        // bad manners
        foreach ($jobs as $job) {
            // feel afraid
        }

        // good
        $jobs->each(function (Job $job) {
            // do magic
        });
    }

    public function transaction(): void
    {
        // 1. closure
        $attempts = 10;
        DB::transaction(function () {
            // query 1
            // query 2
        }, $attempts);

        // 2. procedure
        DB::beginTransaction();
        try {
            // query 1
            // query 2
        } catch (Throwable $e) {
            report($e); // don't forget!
            DB::rollBack();

            return;
        }

        DB::commit();
    }

    public function eloquent(): void
    {
        // bad
        Job::where('title', 'Lorem ipsum')->first();

        // good
        Job::query()->where('title', 'Lorem ipsum')->first();

        // awesome
        // learn framework API!
        Job::query()->firstWhere('title', 'Lorem ipsum');
    }

    public function replica(): void
    {
        /**
         * replica lag trouble
         *
         * REPLICA: select ...
         * MASTER: insert ...
         */
        Job::query()->updateOrCreate(['title' => 'Lorem Ipsum'], ['content' => 'Hello world']);

        /**
         * Only master!
         * `on duplicate key update` syntax
         */
        Job::query()->upsert(['title' => 'Lorem Ipsum', 'content' => 'Hello world'], ['title']);
    }
}
