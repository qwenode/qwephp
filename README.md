# qwephp
an php utility library
#
[![GitHub tag (latest SemVer pre-release)](https://img.shields.io/github/v/tag/qwenode/qwephp?include_prereleases)](https://github.com/qwenode/qwephp/releases)
[![Build Status](https://github.com/qwenode/qwephp/workflows/Build%20Status/badge.svg)](https://github.com/qwenode/qwephp/actions?query=workflow%3A%22Build+Status%22)
[![GitHub license](https://img.shields.io/github/license/qwenode/qwephp)](https://github.com/qwenode/qwephp/blob/master/LICENSE)


## Table of Contents
- [Installation](#installation)
- [Tests](#tests)
- [Strings](#strings)
    - [trim](#trim)

## Installation
Manual install with composer
```shell script
composer require qwenode/qwephp
```

## Tests

```shell script
$ php vendor/bin/codecept run
```

## Strings

### trim
trim string like php trim()
```php
\qwephp\Strings::trim('a '); //output a
```
