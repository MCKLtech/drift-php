<?php

namespace Drift;

use Http\Client\Exception;
use stdClass;

class DriftGDPR extends DriftResource
{
    /**
     * Trigger GDPR Retrieval
     *
     * @see    https://devdocs.drift.com/docs/gdpr-retrieval
     * @param string $email
     * @return stdClass
     */
    public function retrieve(string $email)
    {
        return $this->client->post("gdpr/retrieve", ['email' => $email]);
    }

    /**
     * Trigger GDPR Deletion
     *
     * @see    https://devdocs.drift.com/docs/gdpr-deletion
     * @param string $email
     * @return stdClass
     */
    public function delete(string $email)
    {
        return $this->client->post("gdpr/delete", ['email' => $email]);
    }

}
