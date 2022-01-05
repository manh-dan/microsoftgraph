<?php

namespace Manhdan\Microsoft\Graph;

use Manhdan\Microsoft\Traits\Token;
use Manhdan\Microsoft\Traits\Request;
use Manhdan\Microsoft\Traits\Version;

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
        $url      = $this->_setUrl($url);
        $response = $this->_createHttp()->get($url, $data);
        return $this->_httpException($response);
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
        $url      = $this->_setUrl($url);
        $response = $this->_createHttp()->post($url, $data);
        return $this->_httpException($response);
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
        $url      = $this->_setUrl($url);
        $response = $this->_createHttp()->put($url, $data);
        return $this->_httpException($response);
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
        $url      = $this->_setUrl($url);
        $response = $this->_createHttp()->patch($url, $data);
        return $this->_httpException($response);
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
        $url      = $this->_setUrl($url);
        $response = $this->_createHttp()->delete($url, $data);
        return $this->_httpException($response);
    }
}

