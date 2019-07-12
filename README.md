# php-go-errors

PHP implementation of golang errors package.

[![Build Status](https://travis-ci.org/rumd3x/php-go-errors.svg?branch=master)](https://travis-ci.org/rumd3x/php-go-errors)
![Codecov](https://img.shields.io/codecov/c/github/rumd3x/php-go-errors.svg)
![PHP Version](https://img.shields.io/packagist/php-v/rumd3x/php-go-errors.svg)

## Install

```sh
composer require rumd3x/php-go-errors
```

## Example

Here's an example of usage of the standard `Error` implementation.


For more information consult the API documentation on the section below.

```php
<?php
require 'vendor/autoload.php';

use Rumd3x\Errors\Error;


$result = exampleFunction();

if ($result instanceof Error) {
    echo "$result\n";
    exit 1;
}

echo "File contents:\n";
foreach ($data as $row) {
    echo "$row\n";
}

/**
 * The example function
 */
function exampleFunction() {
    $data = file('filename.txt');

    if ($data === false) {
        return Error::new('failed to open file');
    }

    return $data;
}
```

## API

This library provides two utilities that can be used and extended upon:

- A standard interface: `Rumd3x\Errors\ErrorInterface`;
- A standard implementation: `Rumd3x\Errors\Error` that already implements `Rumd3x\Errors\ErrorInterface`;

### Error (Interface)

An `Rumd3x\Errors\ErrorInterface` implementation's constructor should accept the error message string as its first and only parameter.

```php
$err = new ErrorImplementation('error message');
```

It should also provide a public method `error` to convert the instance into the error message:

```php
$err = new ErrorImplementation('error message');
echo $err->error();
```

### Error (Implementation)

The standard error implementation full classname is `Rumd3x\Errors\Error` and already implements `Rumd3x\Errors\ErrorInterface`.

- The standard error implementation contained in this library is not final, so it can be extended upon.
- It can also be safely treated as a string.

It also provides the following extra methods:

- `new` (Static)
- `newf` (Static)

#### new

The `new` method, allows to create a new instance of error, but statically, it is functionally the same as using the constructor.

```php
$err = Error::new('error message');
```

#### newf

The `newf` method, allows to create a new instance of error, but it can accept an infinite amount of arguments: (It is functionally the same as formatting a string using `sprintf` then passing it to the `new` method)

- The first argument should be the error text, but it accepts the `%` notation for formatting;
- The rest of the parameters should be the arguments to be formatted on the error text;

```php
$err = Error::newf('error: %d is %s than %d', 10, 'less', 20);
```

#### Treating error as string

The `Rumd3x\Errors\Error` or whatever class extend it, can be safely treated as a string, and used alongside one.

```php
$err = Error::new('error message');
$text = $error->error(); // $text should contain 'error message'
$text2 = (string) $error; // $text2 should also contain 'error message'
echo $err; // should output 'error message'
echo "Error: $err"; // should output 'Error: error message'
```
