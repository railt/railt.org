# Установка

- [Системные требования](/installation#системные-требования)
- [Установка](/installation#установка)
    - [Webonyx Adapter](/installation#webonyx-adapter)
    - [Youshido Adapter](/installation#youshido-adapter)
- [Интеграция](/installation#интеграция)
    - [Laravel](/installation#laravel)
    - [Symfony](/installation#symfony)
    - [Agnostic](/installation#agnostic)
- [Зависимости](/installation#зависимости)
- [Статус](/installation#статус)

## Системные требования

Эта библиотека основана на современных концепциях PHP7 кода и может
отличаться в приведенных примерах вашим «представлением кода».
Не бойтесь - это не означает, что вы не можете использовать знакомые подходы
к разработке программного обеспечения =)

- **PHP 7.1+**
    - `ext-mbstring` - поддержка мультибайтовой кодировки (`UTF-8`)
    
- **Composer**
> Руководство по установке Composer [можно найти здесь](https://getcomposer.org/download/).

## Установка

Для установки вам потребуется [Composer](https://getcomposer.org/download/).

?> Railt не умеет принимамать GraphQL запросы и полагается на существующие 
реализации, в частности [Webonyx](https://github.com/webonyx/graphql-php) и 
[Youshido](https://github.com/Youshido/GraphQL).

Установка ядра:
- `composer require railt/railt`

Установка обработчика запросов:
- `composer require railt/xxx-adapter` (например `railt/webonyx-adapter`)

### Webonyx Adapter

[Webonyx](https://github.com/webonyx/graphql-php) [адаптер](https://github.com/railt/webonyx-adapter) 
для обработки запросов. Одна из нескольких библиотек ядра, работа без которой невозможна.

Для установки поддержки webonyx, воспользуйтесь следующей командой:

- `composer require railt/webonyx-adapter`

### Youshido Adapter

!> Внимание! В данный момент поддержка этой бибилиотеки не осуществляется. 

[Youshido](https://github.com/Youshido/GraphQL) [адаптер](https://github.com/railt/youshido-adapter) 
для обработки запросов. Одна из нескольких библиотек ядра, работа без которой невозможна.

Для установки поддержки youshido, воспользуйтесь следующей командой:

- `composer require railt/youshido-adapter`

## Интеграция

### Laravel

Railt поддерживает Laravel следующих версий: `5.1 LTS`, `5.2`, `5.3`, `5.4` и `5.5 LTS`.

#### Laravel 5.5 or greater

- `composer require railt/laravel-provder`
- `php artisan vendor:publish --tag=railt`

#### Laravel 5.4 or less

- `composer require railt/laravel-provder`
- Add the service provider to your app/config/app.php file:
```php
'providers' => [
    // ...
    Railt\LaravelProvider\RailtServiceProvider::class,
]
```
- `php artisan vendor:publish --tag=railt`

### Symfony 

Railt поддерживает Symfony следующих версий: `2.7 LTS`, `2.8 LTS`, `3.0`, `3.1`, `3.2`, `3.3`, `3.4 LTS`, `4.0`.

- `composer require railt/symfony-bundle`

### Agnostic

- `composer require railt/railt`
- `composer require railt/xxx-adapter`
    
## Зависимости

Список внешних зависимостей:

- **[hoa/compiler](https://packagist.org/packages/hoa/compiler)**
    > Библиотека, предоставляющая LL(k) &rarr; AST компилятор, предоставляющий `*.pp` грамматику.
    
- **[illuminate/support](https://packagist.org/packages/illuminate/support)**
    > Бибилиотека, реализующая функции-хелперы для работы со строками, массивами, коллекциями и прочим.
    
!> В будущем возможен отказ от зависимости `illuminate/support`.
    
## Статус

| Название                  | Status        | Coverage      | Quality Score | Release |
|---------------------------|---------------|---------------|---------------|---------|
| `railt/railt`             | ![Build Status](https://travis-ci.org/railt/railt.svg?branch=master)            | ![Code Coverage](https://scrutinizer-ci.com/g/railt/railt/badges/coverage.png?b=master) | ![Quality Score](https://scrutinizer-ci.com/g/railt/railt/badges/quality-score.png?b=master) | ![Latest Stable Version](https://poser.pugx.org/railt/railt/version) |
| `railt/webonyx-adapter`   | ![Build Status](https://travis-ci.org/railt/webonyx-adapter.svg?branch=master)  | ![Code Coverage](https://scrutinizer-ci.com/g/railt/webonyx-adapter/badges/coverage.png?b=master) | ![Quality Score](https://scrutinizer-ci.com/g/railt/webonyx-adapter/badges/quality-score.png?b=master) | ![Latest Stable Version](https://poser.pugx.org/railt/webonyx-adapter/version) |
| `railt/youshido-adapter`  | ![Build Status](https://travis-ci.org/railt/youshido-adapter.svg?branch=master) | ![Code Coverage](https://scrutinizer-ci.com/g/railt/youshido-adapter/badges/coverage.png?b=master) | ![Quality Score](https://scrutinizer-ci.com/g/railt/youshido-adapter/badges/quality-score.png?b=master) | ![Latest Stable Version](https://poser.pugx.org/railt/youshido-adapter/version) |
| `railt/laravel-provider`  | ![Build Status](https://travis-ci.org/railt/laravel-provider.svg?branch=master) | ![Code Coverage](https://scrutinizer-ci.com/g/railt/laravel-provider/badges/coverage.png?b=master) | ![Quality Score](https://scrutinizer-ci.com/g/railt/laravel-provider/badges/quality-score.png?b=master) | ![Latest Stable Version](https://poser.pugx.org/railt/laravel-provider/version) |
| `railt/symfony-bundle`    | ![Build Status](https://travis-ci.org/railt/symfony-bundle.svg?branch=master)   | ![Code Coverage](https://scrutinizer-ci.com/g/railt/symfony-bundle/badges/coverage.png?b=master) | ![Quality Score](https://scrutinizer-ci.com/g/railt/symfony-bundle/badges/quality-score.png?b=master) | ![Latest Stable Version](https://poser.pugx.org/railt/symfony-bundle/version) |
