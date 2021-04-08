<?php

namespace Drift;

use Http\Client\Exception;
use stdClass;

class DriftAdmin extends DriftResource
{
    /**
     * Trigger App Uninstall
     *
     * @see    https://devdocs.drift.com/docs/app-uninstall
     * @param $clientId
     * @param $clientSecret
     * @return stdClass
     */
    public function uninstall(string $clientId, string $clientSecret)
    {
        return $this->client->post("app/uninstall", ['clientId' => $clientId, 'clientSecret' => $clientSecret]);
    }

    /**
     * Get Token Information
     *
     * @see    https://devdocs.drift.com/docs/get-token-information
     * @param string $accessToken
     * @return stdClass
     */
    public function token(string $accessToken)
    {
        return $this->client->post("app/token_info", ['accessToken' => $accessToken]);
    }



}
