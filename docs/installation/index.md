# Installation

## Install the package

All you need to do to get started is add Laravel Lang to your composer dependencies:

```bash:no-line-numbers
composer require laravel-lang/publisher laravel-lang/attributes --dev
```

By default, the [publisher](https://publisher.laravel-lang.com) automatically loads all of plugins ([local](https://publisher.laravel-lang.com/plugins/local.html) and [community](https://publisher.laravel-lang.com/plugins/community.html)).

Therefore, all you need to do after installation is to run the command:

```bash:no-line-numbers
php artisan lang:update
```
