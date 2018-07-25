<?php

namespace Scriptotek\Alma\Conf;

use Scriptotek\Alma\Client;
use Scriptotek\Alma\GhostModel;

class Location extends GhostModel
{
    /** @var Library */
    public $library;

    /** @var string */
    public $code;

    public function __construct(Client $client, Library $library, $code)
    {
        parent::__construct($client);
        $this->library = $library;
        $this->code = $code;
    }

    /**
     * Check if we have the full representation of our data object.
     *
     * @param \stdClass $data
     * @return boolean
     */
    protected function isInitialized($data)
    {
        return isset($data->location);
    }

    /**
     * Generate the base URL for this resource.
     *
     * @return string
     */
    protected function urlBase()
    {
        return "/conf/libraries/{$this->library->code}/locations/{$this->code}";
    }
}
