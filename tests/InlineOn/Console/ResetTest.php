<?php

declare(strict_types=1);

namespace Tests\InlineOn\Console;

use LaravelLang\Publisher\Exceptions\SourceLocaleDoesntExistsException;
use LaravelLang\Publisher\Facades\Helpers\Locales;
use Tests\InlineOnTestCase;

class ResetTest extends InlineOnTestCase
{
    public function testAcceptConfirmation()
    {
        $this->artisan('lang:reset')
            ->expectsConfirmation('Do you want to reset all localizations?')
            ->expectsChoice('Select localizations to reset (specify the necessary localizations separated by commas):', $this->locale, Locales::installed())
            ->assertExitCode(0)
            ->run();
    }

    public function testUnknownLanguageFromCommand()
    {
        $this->expectException(SourceLocaleDoesntExistsException::class);
        $this->expectExceptionMessage('The source "foo" localization was not found.');

        $locales = 'foo';

        $this->artisan('lang:reset', compact('locales'))->run();
    }

    public function testReset()
    {
        $this->copyFixtures();

        $this->assertSame('Foo', __('validation.attributes.address'));
        $this->assertSame('Bar', __('validation.attributes.age'));

        $this->artisan('lang:reset', [
            'locales' => $this->default,
        ])->run();

        $this->refreshLocales();

        $this->assertSame('Address', __('validation.attributes.address'));
        $this->assertSame('Age', __('validation.attributes.age'));
    }

    public function testFull()
    {
        $this->copyFixtures();

        $this->assertSame('Foo', __('validation.attributes.address'));
        $this->assertSame('Bar', __('validation.attributes.age'));

        $this->artisan('lang:reset', [
            'locales' => $this->default,
            '--full'  => true,
        ])->run();

        $this->refreshLocales();

        $this->assertSame('Address', __('validation.attributes.address'));
        $this->assertSame('Age', __('validation.attributes.age'));
    }
}
