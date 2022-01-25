<?php

declare(strict_types=1);

namespace LaravelLang\Development\Support;

class Arr
{
    public function merge(array ...$arrays): array
    {
        $result = [];

        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $result[$key] = $this->merge($result[$key] ?? [], $value);

                    continue;
                }

                $result[$key] = $value;
            }
        }

        return $result;
    }
}
