# Get started with the Microsoft Graph SDK for PHP
If your project uses the Microsoft Graph API, you should use this library to make it easier to implement with the Microsoft Graph API.\
Documentation Microsoft Graph API: https://docs.microsoft.com/en-us/graph/api/overview?view=graph-rest-1.0

## Install the SDK
You can install the PHP SDK with Composer, either run `composer require manhdan/microsoftgraph`, or edit your `composer.json` file:
```
"manhdan/microsoftgraph": "^1.0"
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

Copyright (c) ManhDanBlogs Corporation. All Rights Reserved. Licensed under the MIT [license].
