<?php

namespace App\Providers;

use App\Tips\AnyService;
use Illuminate\Support\ServiceProvider;

class AnyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('any-service', fn(): AnyService => new AnyService);
    }
}
