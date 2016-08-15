# itraq-php

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-scrutinizer]][link-scrutinizer]
[![Coveralls Status][ico-coveralls]][link-coveralls]
[![Codeship Status][ico-codeship]][link-codeship]


PHP wrapper for the iTraq API.

iTraq is a celluar GPS tracking device which can be purchased at [itraq.com](http://itraq.refr.cc/2XCNJXX)


## Install

Via [Composer][link-composer]

``` bash
$ composer require zembrowski/itraq-php
```


## Usage

With [Composer][link-composer]
``` php
require_once 'vendor/autoload.php';

$email = 'name@domain.com';
$password = 'pa$$word';
$apiKey = '{apiKey given by iTraq}';

try {
  $itraq = new iTraq\User($apiKey);
  $token = $itraq->login($email, $password);
  $itraq = new iTraq\Devices($token);
  $devices = $itraq->devices();
  echo $devices;
} catch (Exception $e) {
  echo '[ERROR] ' . $e->getMessage();
}
```

See [examples.php](examples.php) for an advanced example.


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [Krzysztof Tomasz Zembrowski][link-author]
- [All Contributors][link-contributors]


## Licenses

The [MIT License](LICENSE) and [DBAD Public License](link-dbad) applies. Please see [License File](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/zembrowski/itraq-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/zembrowski/itraq-php.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/zembrowski/itraq-php/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/g/zembrowski/itraq-php.svg?style=flat-square
[ico-coveralls]: https://coveralls.io/repos/github/zembrowski/itraq-php/badge.svg?branch=master
[ico-codeship]: https://codeship.com/projects/ID/status?branch=master

[link-packagist]: https://packagist.org/packages/zembrowski/itraq-php
[link-downloads]: https://packagist.org/packages/zembrowski/itraq-php
[link-travis]: https://travis-ci.org/zembrowski/itraq-php
[link-scrutinizer]: https://scrutinizer-ci.com/g/zembrowski/itraq-php
[link-coveralls]: https://coveralls.io/github/zembrowski/itraq-php
[link-codeship]: https://codeship.com/projects/ID

[link-composer]: https://getcomposer.org
[link-author]: https://github.com/zembrowski
[link-contributors]: ../../contributors
[link-dbad]: http://www.dbad-license.org/
