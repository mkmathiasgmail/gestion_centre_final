<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set default string length for database schema
        Schema::defaultStringLength(191);

        // Log all database queries
        DB::listen(function ($query) {
            File::append(
                storage_path('/logs/query.log'),
                $sql = Str::replaceArray('?', $query->bindings, $query->sql)
            );
        });
    }
}
