<?php


namespace Drift;

abstract class DriftResource
{
    /**
     * @var DriftClient
     */
    protected $client;

    /**
     * DriftResource constructor.
     *
     * @param DriftClient $client
     */
    public function __construct(DriftClient $client)
    {
        $this->client = $client;
    }
}
