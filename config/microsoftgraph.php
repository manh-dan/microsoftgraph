<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
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
