<?php

namespace Manhdan\Microsoftgraph\Traits;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

trait Request
{
    /**
     * Header the Microsoft Graph REST API.
     *
     * @var string
     */
    protected $headers;

    /**
     * Set header the Microsoft Graph REST API.
     *
     * @param  array  $headers
     * @return $this
     */
    public function withHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Set url the Microsoft Graph REST API.
     *
     * @param  string  $url
     * @return string
     */
    private function _setUrl(string $url)
    {
        $baseUrl        = config('microsoftgraph.resource') . '/' . $this->version;
        $firstCharacter = substr($url, 0, 1);
        if ($firstCharacter == '/') {
            return $baseUrl . $url;
        }
        return $baseUrl . '/' . $url;
    }

    /**
     * Create HTTP.
     *
     * @return Illuminate\Support\Facades\Http
     */
    private function _createHttp()
    {
        // Refresh token
        $this->_refreshAccessToken();

        // Set token for HTTP
        $response  = Http::withToken($this->access_token);

        // Set header for HTTP
        if ($this->headers) {
            $response = $response->withHeaders($this->headers);
        }

        return $response;
    }

    /**
     * HTTP Exception.
     *
     * @param  string  $response
     * @return Symfony\Component\HttpKernel\Exception\HttpException
     */
    private function _httpException($response)
    {
        // Call HTTP successful
        if ($response->successful()) {
            return $response->json();
        }

        // Call HTTP failure
        throw new HttpException($response->status(), $response->json()['error']['message'], null, []);
    }

    /**
     * Create HTTP Grap.
     *
     * @return Illuminate\Support\Facades\Http
     */
    private function _createHttpGrap($graph)
    {
        if ($this->headers) {
            $graph = $graph->withHeaders($this->headers);
        }
        return $graph->onVersion($this->version);
    }
}
