<?php

namespace Manhdan\Microsoftgraph\Traits;

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
}
