<?php

namespace Manhdan\Microsoftgraph;

use Illuminate\Support\Facades\Http;
use Manhdan\Microsoftgraph\Traits\Token;
use Manhdan\Microsoftgraph\Traits\Request;
use Manhdan\Microsoftgraph\Traits\Version;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Graph
{
    use Token, Request, Version;

    /**
     * Create a new Manhdan Microsoft Graph.
     *
     * @return void
     */
    public function __construct()
    {
        $this->_getAccessToken();
        $this->version = $this->_setVersion(config('microsoftgraph.version'));
    }

    /**
     * Methos GET The Microsoft Graph REST API.
     *
     * @param  string  $url
     * @param  array  $data
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function get(string $url, array $data = [])
    {
        $this->_checkAccessToken();

        $url      = $this->_setUrl($url);
        $response = Http::withToken($this->access_token);

        if ($this->headers) {
            $response = $response->withHeaders($this->headers);
        }

        $response = $response->get($url, $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new HttpException($response->status(), $response->json()['error']['message'], null, []);
    }

    /**
     * Methos POST The Microsoft Graph REST API.
     *
     * @param  string  $url
     * @param  array  $data
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function post(string $url, array $data)
    {
        $this->_checkAccessToken();

        $url      = $this->_setUrl($url);
        $response = Http::withToken($this->access_token);

        if ($this->headers) {
            $response = $response->withHeaders($this->headers);
        }

        $response = $response->post($url, $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new HttpException($response->status(), $response->json()['error']['message'], null, []);
    }

    /**
     * Methos PUT The Microsoft Graph REST API.
     *
     * @param  string  $url
     * @param  array  $data
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function put(string $url, array $data)
    {
        $this->_checkAccessToken();

        $url      = $this->_setUrl($url);
        $response = Http::withToken($this->access_token);

        if ($this->headers) {
            $response = $response->withHeaders($this->headers);
        }

        $response = $response->put($url, $data);

        if ($response->successful()) {
            return $response->json();
        }

       throw new HttpException($response->status(), $response->json()['error']['message'], null, []);
    }

    /**
     * Methos PATCH The Microsoft Graph REST API.
     *
     * @param  string  $url
     * @param  array  $data
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function patch(string $url, array $data)
    {
        $this->_checkAccessToken();

        $url      = $this->_setUrl($url);
        $response = Http::withToken($this->access_token);

        if ($this->headers) {
            $response = $response->withHeaders($this->headers);
        }

        $response = $response->patch($url, $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new HttpException($response->status(), $response->json()['error']['message'], null, []);
    }

     /**
     * Methos DELETE The Microsoft Graph REST API.
     *
     * @param  string  $url
     * @param  array  $data
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function delete(string $url, array $data)
    {
        $this->_checkAccessToken();

        $url      = $this->_setUrl($url);
        $response = Http::withToken($this->access_token);

        if ($this->headers) {
            $response = $response->withHeaders($this->headers);
        }

        $response = $response->delete($url, $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new HttpException($response->status(), $response->json()['error']['message'], null, []);
    }
}

