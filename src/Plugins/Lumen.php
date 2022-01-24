<?php

declare(strict_types=1);

namespace LaravelLang\Attributes\Plugins;

use LaravelLang\Publisher\Plugins\BasePlugin;

class Lumen extends BasePlugin
{
    public function vendor(): ?string
    {
        return 'laravel/lumen-framework';
    }

    public function files(): array
    {
        return [
            'validation.php' => '{locale}/validation.php',
        ];
    }
}
