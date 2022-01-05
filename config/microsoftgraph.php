<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    */

    'grant_type'    => 'client_credentials',
    'client_secret' => env('MICROSOFT_GRAPH_CLIENT_SECRET'),
    'client_id'     => env('MICROSOFT_GRAPH_CLIENT_ID'),
    'scope'         => 'https://graph.microsoft.com/.default',
    'tenant_id'     => env('MICROSOFT_GRAPH_TENANT_ID'),
    'resource'      => 'https://graph.microsoft.com',
    'version'       => env('MICROSOFT_GRAPH_VERSION', '1.0'),
];
