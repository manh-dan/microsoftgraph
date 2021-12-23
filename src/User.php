<?php

namespace Manhdan\Microsoftgraph;

use Manhdan\Microsoftgraph\Graph;

class User
{
    protected $graph;

    protected $headers;

    public function __construct()
    {
        $this->graph = new Graph();
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function list(array $params = [])
    {
        if ($this->headers) {
            return  $this->graph->withHeaders($this->headers)->get('/v1.0/users', $params);
        }
        return  $this->graph->get('/v1.0/users', $params);
    }
}
