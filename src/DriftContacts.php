<?php

namespace Drift;

use Http\Client\Exception;
use stdClass;

class DriftContacts extends DriftResource
{

    /**
     * Lists Contacts
     *
     * @see    https://devdocs.drift.com/docs/listing-users
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function list(array $options = [])
    {
        return $this->client->get('contacts/list', $options);
    }

    /**
     * Creates a Contact
     *
     * @see    https://devdocs.drift.com/docs/creating-a-contact
     * @param array $attributes
     * @return stdClass
     */
    public function create(array $attributes)
    {
        return $this->client->post("contacts", ['attributes' => $attributes]);
    }

    /**
     * Updates a Contact
     *
     * @see    https://devdocs.drift.com/docs/updating-a-contact
     * @param mixed $id Drift Contact ID
     * @param array $attributes
     * @return stdClass
     */
    public function update($id, array $attributes)
    {
        return $this->client->patch("contacts/$id", ['attributes' => $attributes]);
    }

    /**
     * Deletes a Contact (Not GDPR Compliant. See docs)
     *
     * @see    https://devdocs.drift.com/docs/removing-a-contact
     * @param mixed $id Drift Contact ID
     * @return stdClass
     */
    public function delete($id)
    {
        return $this->client->delete("contacts/$id");
    }

    /**
     * Unsubscribe Contact From Emails
     *
     * @see    https://devdocs.drift.com/docs/unsubscribe-contacts-from-emails
     * @param string $email
     * @return stdClass
     */
    public function unsubscribe(string $email)
    {
        return $this->client->post("emails/unsubscribe", [$email]);
    }

    /**
     * Add Timeline Event
     *
     * @see    https://devdocs.drift.com/docs/posting-timeline-events
     * @param array $parameters
     * @return stdClass
     */
    public function addToTimeline(array $parameters)
    {
        return $this->client->post("contacts/timeline", $parameters);
    }

    /**
     * Updates a Contact via non-Drift Id (Alternative)
     *
     * @see    https://devdocs.drift.com/docs/updating-a-contact-via-non-drift-id
     * @param string $type
     * @param mixed $id Drift Contact ID
     * @param array $attributes
     * @return stdClass
     */
    public function updateAlt(string $type, $id, array $attributes)
    {
        return $this->client->patch("contacts/normalize", array_merge(['idType' => $type, 'id' => $id],['attributes' => $attributes]));
    }

    /**
     * Gets a single Contact based on the Drift ID.
     *
     * @see    https://devdocs.drift.com/docs/retrieving-contact
     * @param string $id
     * @param array $options
     * @return stdClass
     */
    public function getById($id, $options = [])
    {
        return $this->client->get("users/$id", $options);
    }

    /**
     * Gets a single Contact based on their email
     *
     * @see    https://devdocs.drift.com/docs/retrieving-contact
     * @param string $email
     * @param array $options
     * @return stdClass
     */
    public function getByEmail(string $email, $options = [])
    {
        return $this->client->get("contacts", array_merge(['email' => $email], $options));
    }

    /**
     * Listing Custom Attributes
     *
     * @see    https://devdocs.drift.com/docs/listing-custom-attributes
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function customAttributes()
    {
        return $this->client->get('contacts/attributes');
    }



}
