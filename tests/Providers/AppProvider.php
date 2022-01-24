<?php

declare(strict_types=1);

namespace Tests\Providers;

use YourNamespace\Translations\Provider as BaseProvider;

class AppProvider extends BaseProvider
{
    public function basePath(): string
    {
        return __DIR__ . '/../../';
    }
}
