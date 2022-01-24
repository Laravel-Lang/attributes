<?php

declare(strict_types=1);

namespace Tests\InlineOn\Console;

use Tests\InlineOnTestCase;

class UpdateTest extends InlineOnTestCase
{
    public function testUpdate()
    {
        $this->copyFixtures();

        $this->assertSame('Foo', __('validation.attributes.address'));
        $this->assertSame('Bar', __('validation.attributes.age'));

        $this->artisan('lang:update')->run();

        $this->refreshLocales();

        $this->assertSame('Address', __('validation.attributes.address'));
        $this->assertSame('Age', __('validation.attributes.age'));
    }
}
