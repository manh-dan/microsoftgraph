<?php

namespace Manhdan\Microsoftgraph;

use Manhdan\Microsoftgraph\Graph;
use Manhdan\Microsoftgraph\Traits\Request;
use Manhdan\Microsoftgraph\Traits\Version;

class User
{
    use Request, Version;

    /**
     * The ManhDan Microsoft Graph REST API.
     *
     * @var string
     */
    protected $graph;

    /**
     * Create a new Manhdan Microsoft Graph User.
     *
     * @return void
     */
    public function __construct()
    {
        $this->graph   = new Graph();
        $this->version = $this->_setVersion(config('microsoftgraph.version'));
    }

    /**
     * Retrieve a list of user objects.
     *
     * @param  array  $params
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function list(array $params = [])
    {
        return $this->_createHttpGrap($this->graph)->get('/users', $params);
    }

     /**
     * Create a new user.
     *
     * @param  array  $params
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function create(array $params)
    {
        return $this->_createHttpGrap($this->graph)->post('/users', $params);
    }

     /**
     * Retrieve the properties and relationships of user object.
     *
     * @param  string  $id
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function find($id)
    {
        return $this->_createHttpGrap($this->graph)->get("/users/{$id}");
    }

    /**
     * Update the properties of a user object.
     *
     * @param  string  $id
     * @param  array  $params
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function update($id, array $params)
    {
        return $this->_createHttpGrap($this->graph)->patch("/users/{$id}", $params);
    }

    /**
     * Delete user.
     *
     * @param  string  $id
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function delete($id)
    {
        return $this->_createHttpGrap($this->graph)->delete("/users/{$id}");
    }

    /**
     * Enable the user to update their password. Any user can update their password without belonging to any administrator role.
     *
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function changePassword()
    {
        return $this->_createHttpGrap($this->graph)->post('/me/changePassword');
    }
    /**
     * Get newly created, updated, or deleted users without having to perform a full read of the entire user collection. See change tracking for details.
     *
     * @param  array  $params
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function delta(array $params = [])
    {
        return $this->_createHttpGrap($this->graph)->get('/users/delta', $params);
    }
}
