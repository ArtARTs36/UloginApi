## ULogin API

![PHP Composer](https://github.com/ArtARTs36/UloginApi/workflows/PHP%20Composer/badge.svg?branch=master)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<a href="https://poser.pugx.org/artarts36/ulogin-api/d/total.svg">
    <img src="https://poser.pugx.org/artarts36/ulogin-api/d/total.svg" alt="Total Downloads">
</a>

----

### Description:

Client for work with API http://ulogin.ru

Ulogin Documentation: https://ulogin.ru/help.php

---

### Installation:

`composer require artarts36/ulogin-api`

----

### Examples:

#### Simple:

```php
use ArtARTs36\ULoginApi\Api;
use ArtARTs36\ULoginApi\Client;

$client = new Client($_SERVER['HTTP_HOST']);
$api = new Api($client);

var_dump($api->user($_POST['token']));
```

#### Connect in Laravel:

1*. Binding in bootstrap/app.php:

```php
$app->singleton(
    \ArtARTs36\ULoginApi\Client::class,
    function () {
        return new \ArtARTs36\ULoginApi\Client(request()->getHost());
    }
);
```
