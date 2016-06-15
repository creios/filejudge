# Filejudge - I am the law

[![Build Status](https://travis-ci.org/creios/filejudge.svg?branch=master)](https://travis-ci.org/creios/filejudge)
[![Coverage Status](https://coveralls.io/repos/creios/filejudge/badge.svg?branch=master&service=github)](https://coveralls.io/github/creios/filejudge?branch=master)
[![GitHub license](https://img.shields.io/github/license/creios/filejudge.svg)]()

**Filejudge** is a validation library for files and images.

```php
<?php

use Creios\FileJudge\FileJudge;

$judgement = (new FileJudge())
    //establish your constraints
    ->addAssertedMediaType("text")
    ->addAssertedMediaTypeSubtype("html")
    ->addAssertedMediaTypeSubtype("xml")
    ->setAssertedMaxFileSize(1337)
    ->setAssertedMinFileSize(42)
    //judge on basis of your constraints
    ->judge("./template.html");

//evaluate the judgement
if($judgement->isPassed()){
    echo "File passed validation.";
}else{
    echo "File didn't pass validation.";
}
```

## Imagejudge

You can not only validate files against generally attributes like file size and media type but also images with specifically attributes like width and height.

```php
<?php

use Creios\FileJudge\ImageJudge;

$judgement = (new ImageJudge())
    //establish your constraints
    ->setAssertedMaxHeight(101)
    ->setAssertedMinHeight(99)
    //judge on basis of your constraints
    ->judge("./image.png");
```

## Constraints

With Filejudge you can judge on the basis of a series of constraints.

* Media Type (MIME-Type) including Subtype
* Minimum / maximum file size
* Minimum / maximum height (images only)
* Minimum / maximum width (images only)

## Judgement

The result of the judge method is a judgement. It represents the outcome of the validating based on the constraints.

**isPassed() : boolean**

**getActualMediaType() : string**

**getActualMediaTypeSubtype() : string**

**getActualFileSize() : int**

**getAssertedMediaTypes() : string[]**

**getAssertedMediaTypeSubtypes() : string[]**

**getAssertedMaxFileSize() : int**

**getAssertedMinFileSize() : int**

**isMediaTypeFailed() : boolean**

**isMediaTypeSubtypeFailed() : boolean**

**isMaxFileSizeFailed() : boolean**

**isMinFileSizeFailed() : boolean**

## Install

You can use [composer](https://getcomposer.org/) to download and install filejudge. Visit filejudge on [packagist](https://packagist.org/packages/creios/filejudge).

### composer.json
```json
{
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

