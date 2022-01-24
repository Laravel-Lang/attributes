<?php

declare(strict_types=1);

namespace LaravelLang\Attributes\Plugins;

use LaravelLang\Publisher\Plugins\BasePlugin;

class Laravel extends BasePlugin
{
    public function vendor(): ?string
    {
        return 'laravel/framework';
    }

    public function files(): array
    {
        return [
            'validation.php' => '{locale}/validation.php',
        ];
    }
}
