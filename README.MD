# Filejudge - I am the law

[![Build Status](https://travis-ci.org/creios/filejudge.svg?branch=master)](https://travis-ci.org/creios/filejudge)
[![Coverage Status](https://coveralls.io/repos/creios/filejudge/badge.svg?branch=master&service=github)](https://coveralls.io/github/creios/filejudge?branch=master)
[![GitHub license](https://img.shields.io/github/license/creios/filejudge.svg)]()

```php
<?php
use Creios\FileJudge\FileJudge;

$passed = (new FileJudge(__DIR__ . "/../assets/image.png"))
    ->setAssertedMediaType("image")
    ->setAssertedMediaTypeSubtype("png")
    ->setAssertedMaxFileSize(1337)
    ->setAssertedMinFileSize(42)
    ->judge();

if($passed){
    echo "File passed validation";
}else{
    echo "File didn't pass validation";
}
```

## Install

You can use [composer](https://getcomposer.org/) to download and install filejudge. Visit filejudge on [packagist](https://packagist.org/packages/creios/filejudge).

### composer.json
```json
{
    "repositories": [
        {
        "url": "https://github.com/creios/filejudge.git",
        "type": "git"
        }
    ],
    "require": {
        "creios/filejudge": "^1.0.0"
    }
}
```

or

### comandline

```sh
composer require creios/filejudge
```

