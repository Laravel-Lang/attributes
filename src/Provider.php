<?php

declare(strict_types=1);

namespace YourNamespace\Translations;

use LaravelLang\Publisher\Plugins\BaseProvider;
use YourNamespace\Translations\Plugins\Main;

class Provider extends BaseProvider
{
    public function basePath(): string
    {
        return __DIR__ . '/../';
    }

    public function plugins(): array
    {
        return $this->resolvePlugins([
            Main::class,
        ]);
    }
}
