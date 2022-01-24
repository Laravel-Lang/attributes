<?php

declare(strict_types=1);

namespace Tests\InlineOff\Console;

use LaravelLang\Publisher\Exceptions\SourceLocaleDoesntExistsException;
use LaravelLang\Publisher\Facades\Helpers\Locales;
use Tests\InlineOffTestCase;

class AddTest extends InlineOffTestCase
{
    public function testAcceptConfirmation()
    {
        $this->artisan('lang:add')
            ->expectsConfirmation('Do you want to add all localizations?')
            ->expectsChoice('Select localizations to add (specify the necessary localizations separated by commas):', $this->locale, Locales::available())
            ->assertExitCode(0)
            ->run();
    }

    public function testUnknownLanguageFromCommand()
    {
        $this->expectException(SourceLocaleDoesntExistsException::class);
        $this->expectExceptionMessage('The source "foo" localization was not found.');

        $locales = 'foo';

        $this->artisan('lang:add', compact('locales'))->run();
    }

    public function testInstall()
    {
        $this->copyFixtures();

        $this->assertSame('Foo', __('validation.attributes.address'));
        $this->assertSame('Bar', __('validation.attributes.age'));

        $this->artisan('lang:add', [
            'locales' => $this->default,
        ])->run();

        $this->refreshLocales();

        $this->assertSame('Address', __('validation.attributes.address'));
        $this->assertSame('Age', __('validation.attributes.age'));
    }
}
