<?php

declare(strict_types=1);

namespace LaravelLang\Development\Facades;

use DragonCode\Support\Facades\Facade;
use LaravelLang\Development\Support\Arr as Support;

/**
 * @method static array merge(array ...$arrays)
 */
class Arr extends Facade
{
    protected static function getFacadeAccessor(): mixed
    {
        return Support::class;
    }
}
