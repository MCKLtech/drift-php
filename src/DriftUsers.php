<?php

namespace Drift;

use Http\Client\Exception;
use stdClass;

class DriftUsers extends DriftResource
{

    /**
     * Lists Users
     *
     * @see    https://devdocs.drift.com/docs/listing-users
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function list(array $options = [])
    {
        return $this->client->get('users/list', $options);
    }

    /**
     * Updates a User
     *
     * @see    https://devdocs.drift.com/docs/updating-users
     * @param int $id Drift User ID
     * @param array $attributes
     * @return stdClass
     */
    public function update($id, array $attributes)
    {
        return $this->client->patch("users/update?userId=$id", $attributes);
    }

    /**
     * Gets a single User based on the Drift ID.
     *
     * @see    https://devdocs.drift.com/docs/retrieving-user
     * @param  string $id
     * @return stdClass
     * @throws Exception
     */
    public function get($id)
    {
        return $this->client->get("users/$id");
    }

    /**
     * Get booking meetings
     *
     * @see    https://devdocs.drift.com/docs/get-booked-meetings
     * @param array $options
     * @return stdClass
     */
    public function meetings($options = [])
    {
        return $this->client->get("users/meetings/org", $options);
    }

}
