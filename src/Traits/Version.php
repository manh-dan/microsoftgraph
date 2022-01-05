<?php

namespace Manhdan\Microsoft\Traits;

trait Version
{
    /**
     * The Microsoft Graph REST API version.
     *
     * @var string
     */
    protected $version;

    /**
     * Set the Microsoft Graph REST API version.
     *
     * @param  string  $version
     * @return $this
     */
    public function onVersion($version)
    {
        $this->version = $this->_setVersion($version);
        return $this;
    }

     /**
     * Format Microsoft Graph REST API version.
     *
     * @param  string  $version
     * @return void
     */
    private function _setVersion($version)
    {
        if ($version == 'beta') {
            return $version;
        }
        return strpos($version, 'v') !== false ?  $version : 'v' . $version;
    }
}
