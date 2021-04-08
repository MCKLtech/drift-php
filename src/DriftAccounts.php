<?php

namespace Drift;

use Http\Client\Exception;
use stdClass;

class DriftAccounts extends DriftResource
{

    /**
     * Create an Account
     *
     * @see    https://devdocs.drift.com/docs/creating-an-account
     * @param array $options
     * @return stdClass
     */
    public function create(array $options)
    {
        return $this->client->post("accounts/create", $options);
    }

    /**
     * List Conversations
     *
     * @see    https://devdocs.drift.com/docs/listing-conversations
     * @param array $options
     * @return stdClass
     */
    public function list(array $options = [])
    {
        return $this->client->get("accounts", $options);
    }

    /**
     * Get An Account
     *
     * @see    https://devdocs.drift.com/docs/retrieving-an-account
     * @param $accountId
     * @param array $options
     * @return stdClass
     */
    public function get($accountId, $options = [])
    {
        return $this->client->get("accounts/$accountId", $options);
    }

    /**
     * Update An Account
     *
     * @see    https://devdocs.drift.com/docs/updating-accounts
     * @param array $options
     * @return stdClass
     */
    public function update(array $options)
    {
        return $this->client->patch("accounts/update", $options);
    }

    /**
     * Delete An Account
     *
     * @see    https://devdocs.drift.com/docs/deleting-accounts
     * @param $accountId
     * @return stdClass
     */
    public function delete($accountId)
    {
        return $this->client->delete("accounts/$accountId");
    }


}
