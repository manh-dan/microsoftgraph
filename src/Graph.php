<?php

namespace Manhdan\Microsoftgraph;

use Illuminate\Support\Facades\Http;

class Graph
{
    protected $exp;
    protected $headers;
    protected $access_token;

    public function __construct()
    {
        $this->_getAccessToken();
    }

    public function withHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function get(string $url, array $data = [])
    {
        $this->_checkAccessToken();

        $url = config('microsoftgraph.resource') . $url;

        if ($this->headers) {
            $response = Http::withToken($this->access_token)->withHeaders($this->headers)->get($url, $data);
        } else {
            $response = Http::withToken($this->access_token)->get($url, $data);
        }

        if ($response->successful()) {
            return $response->json();
        }

        abort($response->status(), $response->json()['error']['message']);
    }

    public function put(string $url, array $data)
    {
        $this->_checkAccessToken();

        $url = config('microsoftgraph.resource') . $url;

        if ($this->headers) {
            $response = Http::withToken($this->access_token)->withHeaders($this->headers)->put($url, $data);
        } else {
            $response = Http::withToken($this->access_token)->put($url, $data);
        }

        if ($response->successful()) {
            return $response->json();
        }

        abort($response->status(), $response->json()['error']['message']);
    }

    public function patch(string $url, array $data)
    {
        $this->_checkAccessToken();

        $url = config('microsoftgraph.resource') . $url;

        if ($this->headers) {
            $response = Http::withToken($this->access_token)->withHeaders($this->headers)->patch($url, $data);
        } else {
            $response = Http::withToken($this->access_token)->patch($url, $data);
        }

        if ($response->successful()) {
            return $response->json();
        }

        abort($response->status(), $response->json()['error']['message']);
    }

    public function delete(string $url, array $data)
    {
        $this->_checkAccessToken();

        $url = config('microsoftgraph.resource') . $url;

        if ($this->headers) {
            $response = Http::withToken($this->access_token)->withHeaders($this->headers)->delete($url, $data);
        } else {
            $response = Http::withToken($this->access_token)->delete($url, $data);
        }

        if ($response->successful()) {
            return $response->json();
        }

        abort($response->status(), $response->json()['error']['message']);
    }

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

    private function _checkAccessToken()
    {
        if (time() > $this->exp) {
            $this->_getAccessToken();
        }
    }
}
