<?php

namespace Manhdan\Microsoftgraph\Traits;

use Illuminate\Support\Facades\Http;

trait Token
{
    /**
     * Token expiration time The Microsoft Graph REST API version.
     *
     * @var string
     */
    protected $exp;

    /**
     * Token The Microsoft Graph REST API.
     *
     * @var string
     */
    protected $access_token;

    /**
     * Check token Microsoft Graph REST API.
     *
     * @param  string  $version
     * @return void
     */
    private function _getAccessToken()
    {
        $url  = 'https://login.microsoftonline.com/' . config('microsoftgraph.tenant_id') . '/oauth2/v2.0/token';
        $data = [
            'grant_type'    => config('microsoftgraph.grant_type'),
            'client_id'     => config('microsoftgraph.client_id'),
            'client_secret' => config('microsoftgraph.client_secret'),
            'scope'         => config('microsoftgraph.scope'),
        ];

        $response = Http::asForm()->post($url, $data);

        if ($response->successful()) {
            $exp                = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $response['access_token'])[1]))), true)['exp'];
            $this->exp          = $exp;
            $this->access_token = $response['access_token'];
            return true;
        }

        abort($response->status(), $response->json()['error_description']);
    }

    /**
     * Check token expiration time Microsoft Graph REST API.
     *
     * @param  string  $version
     * @return void
     */
    private function _refreshAccessToken()
    {
        if (time() > $this->exp) {
            $this->_getAccessToken();
        }
    }
}
