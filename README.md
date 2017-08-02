[![Build Status](https://travis-ci.org/M6Web/PhpLint.svg?branch=master)](https://travis-ci.org/M6Web/PhpLint)


# PhpLint

PhpLint is a simple package to simply execute linter on directories.

## Installation

```sh
composer require m6web/php-lint
```

## Usage

PhpLint allows to validate one or multiple directories recursively:

* One directory:
```sh
./bin/phplint directory/path
```

* More than one directory:
```sh
./bin/phplint directory1/path directory2/path ...
```

PhpLint use [symfony/finder](http://symfony.com/doc/current/components/finder.html) to
find directories. So you can use all finder syntax to find directories:
```sh
./bin/phplint directory/*/*/src
```
