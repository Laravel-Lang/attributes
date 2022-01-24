<?php

declare(strict_types=1);

namespace LaravelLang\Attributes;

use LaravelLang\Attributes\Plugins\Laravel;
use LaravelLang\Attributes\Plugins\Lumen;
use LaravelLang\Publisher\Plugins\BaseProvider;

class Provider extends BaseProvider
{
    public function basePath(): string
    {
        return __DIR__ . '/../';
    }

    public function plugins(): array
    {
        return $this->resolvePlugins([
            Laravel::class,
            Lumen::class,
        ]);
    }
}
