# Dommus ERP - Api Client

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

[ico-version]: https://img.shields.io/packagist/v/julianobailao/php-db1-api-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/julianobailao/php-db1-api-client/master.svg?style=flat-square
[ico-scrutinizer]:https://img.shields.io/scrutinizer/coverage/g/julianobailao/php-db1-api-client.svg?style=flat-square
[ico-code-quality]:https://img.shields.io/scrutinizer/g/julianobailao/php-db1-api-client.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/julianobailao/php-db1-api-client.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/76376554/shield

[link-packagist]: https://packagist.org/packages/julianobailao/php-db1-api-client
[link-travis]: https://travis-ci.org/julianobailao/php-db1-api-client
[link-scrutinizer]: https://scrutinizer-ci.com/g/julianobailao/php-db1-api-client/?branch=master
[link-code-quality]: https://scrutinizer-ci.com/g/julianobailao/php-db1-api-client/?branch=master
[link-downloads]: https://packagist.org/packages/julianobailao/php-db1-api-client
[link-styleci]: https://styleci.io/repos/76376554

Uma api client, desenvolvida em php, para o Domus Erp.

## Install

Via Composer

```bash
$ composer require julianobailao/php-db1-api-client
```

## Usage

```php
use JulianoBailao\DomusApi\Client;

$client = new Client('foo.bar', '8080', 'username', 'password');

// Setando a filial
$client->setBranch(2); // por padrao a filial sempre será 1

// Operações de produtos

// Paginação de produtos
$products = $client->products()->paginate(['pageSize' => 100, 'start' => 0]);

// Buscando um produto pelo id
$product = $client->products()->get(12345);

// Criando um novo produto
$product = $client->products()->create();
$product->title = 'blablabla';
$product->fieldTitle = 'field value';
$save = $product->save();

// Atualizando um produto
$product = $client->products()->update(12345);
$product->title = 'blablabla';
$update = $product->save();

// Excluindo um produto
$delete = $client->product()->delete();
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
