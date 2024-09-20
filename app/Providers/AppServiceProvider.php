<?php

namespace App\Providers;

use App\BlowfishEncrypter;
use App\Repository\UserRepository;
use App\Repository\UserRepositoryInterface;
use Illuminate\Encryption\MissingAppKeyException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('encrypter', function($app) {
            $config = $app->make('config')->get('app');
            return new BlowfishEncrypter($this->parseKey($config));
        });

        $this->app->bind(
            UserRepositoryInterface::class, UserRepository::class
        );
    }

    public function parseKey(array $config)
    {
        if (Str::startsWith($key = $this->key($config), $prefix = 'base64:')) {
            $key = base64_decode(Str::after($key, $prefix));
        }
        return $key;
    }

    public function key(array $config)
    {
        return tap(
            $config['key'],
            function($key) {
                if (empty($key)) {
                    throw new MissingAppKeyException();
                }
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
