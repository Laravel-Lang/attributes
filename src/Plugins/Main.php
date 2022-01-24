<?php

declare(strict_types=1);

namespace YourNamespace\Translations\Plugins;

use LaravelLang\Publisher\Plugins\BasePlugin;

class Main extends BasePlugin
{
    public function vendor(): string
    {
        return 'laravel/framework';
    }

    public function files(): array
    {
        return [
            'en.json'    => '{locale}.json',
            'custom.php' => '{locale}/custom.php',
        ];
    }
}
