# Get started with the Microsoft Graph SDK for PHP

[![Build Status](https://travis-ci.org/microsoftgraph/msgraph-sdk-php.svg?branch=master)](https://travis-ci.org/microsoftgraph/msgraph-sdk-php)
[![Latest Stable Version](https://poser.pugx.org/microsoft/microsoft-graph/version)](https://packagist.org/packages/manhdan/microsoftgraph)

## Get started with the PHP Connect Sample
If you want to play around with the PHP library, you can get up and running quickly with the [PHP Connect Sample](https://github.com/microsoftgraph/php-connect-sample). This sample will start you with a little Laravel project that helps you with registration, authentication, and making a simple call to the service.

## Install the SDK
You can install the PHP SDK with Composer, either run `composer require manhdan/microsoftgraph`, or edit your `composer.json` file:
```
composer require manhdan/microsoftgraph
```
## Configuration
You can publish MicrosoftGraph config and view files into your project by running:
```
php artisan vendor:publish --tag=microsoftgraph-config
```
You add the following properties to file .env:
```
MICROSOFT_GRAPH_CLIENT_ID=
MICROSOFT_GRAPH_TENANT_ID=
MICROSOFT_GRAPH_CLIENT_SECRET=
MICROSOFT_GRAPH_VERSION=
```

## Get started with Microsoft Graph
### Call Microsoft Graph using the v1.0 endpoint

The following is an example that shows how to call Microsoft Graph.

```php
use Manhdan\Microsoft\Graph\Graph;

class ManhDanExample
{
    public function run()
    {
        $graph = new Graph();
        return $graph->withHeaders(['X-First' => 'foo'])->get('/users');
    }
}
```
### Call Microsoft Graph using the beta endpoint

The following is an example that shows how to call Microsoft Graph.

```php
use Manhdan\Microsoft\Graph\Graph;

class ManhDanExample
{
    public function run()
    {
        $graph = new Graph();
        return $graph->withHeaders(['X-First' => 'foo'])->onVersion('beta')->get('/users');
    }
}
```

## Copyright and license

Copyright (c) ManhDanBlogs Corporation. All Rights Reserved. Licensed under the MIT [license](LICENSE).
