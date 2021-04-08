<?php

namespace Drift;

use Http\Client\Exception;
use stdClass;

class DriftPlaybooks extends DriftResource
{

    /**
     * List Playbooks
     *
     * @see    https://devdocs.drift.com/docs/get-playbooks
     * @param array $options
     * @return stdClass
     */
    public function list(array $options = [])
    {
        return $this->client->get("playbooks/list", $options);
    }

    /**
     * List Conversational Landing Pages
     *
     * @see   https://devdocs.drift.com/docs/retrieve-conversational-landing-pages
     * @param array $options
     * @return stdClass
     */
    public function clp(array $options = [])
    {
        return $this->client->get("playbooks/clp", $options);
    }

}
