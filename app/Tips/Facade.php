<?php

namespace App\Tips;

use App\Providers\AnyServiceProvider;

/**
 * Facade vs DI
 *
 * benefits: mocking
 * cons: methods documentary
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        /**
         * + requires nothing
         * - default binding
         */
        return AnyService::class;

        /**
         * laravel way
         * - requires service container binding
         * + can be singleton
         *
         * @see AnyServiceProvider::register()
         */
        return 'any-service';
    }
}
