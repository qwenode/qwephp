# qwephp
an php utility library
#
[![GitHub tag (latest SemVer pre-release)](https://img.shields.io/github/v/tag/qwenode/qwephp?include_prereleases)](https://github.com/qwenode/qwephp/releases)
[![Build Status](https://github.com/qwenode/qwephp/workflows/Build%20Status/badge.svg)](https://github.com/qwenode/qwephp/actions?query=workflow%3A%22Build+Status%22)
[![GitHub license](https://img.shields.io/github/license/qwenode/qwephp)](https://github.com/qwenode/qwephp/blob/master/LICENSE)
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fqwenode%2Fqwephp.svg?type=shield)](https://app.fossa.com/projects/git%2Bgithub.com%2Fqwenode%2Fqwephp?ref=badge_shield)

# License
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fqwenode%2Fqwephp.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2Fqwenode%2Fqwephp?ref=badge_large)

## Table of Contents
- [Installation](#installation)
- [Tests](#tests)
- [Strings](#strings)
    - [trim](#trim)
    - [stripSpace](#stripSpace)
## Installation
Manual install with composer
```shell script
composer require qwenode/qwephp
```

## Tests

```shell script
 php vendor/bin/codecept run
```

## Strings
 
### trim
@see trim()
```php
\qwephp\Strings::trim('a '); //a
```
### stripSpace
remove all whitespace from given string

```php
\qwephp\Strings::stripSpace('a b c'); //abc
```
