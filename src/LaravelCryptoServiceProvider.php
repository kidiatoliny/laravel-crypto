<?php

declare(strict_types=1);

namespace Akira\LaravelCrypto;

use Akira\LaravelCrypto\Console\Commands\GenerateCryptoKeyCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class LaravelCryptoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-crypto')
            ->hasCommand(GenerateCryptoKeyCommand::class)
            ->hasConfigFile();
    }

    public function boot()
    {
        $this->app->singleton(LaravelCrypto::class, function ($app) {
            return new LaravelCrypto(config('crypto'));
        });

        return parent::boot(); // TODO: Change the autogenerated stub
    }
}
