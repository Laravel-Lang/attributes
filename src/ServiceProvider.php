<?php

declare(strict_types=1);

namespace YourNamespace\Translations;

use LaravelLang\Publisher\Concerns\BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    protected function getProvider(): string
    {
        return Provider::class;
    }
}
