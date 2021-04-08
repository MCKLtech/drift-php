<?php

namespace Drift;

use Http\Client\Exception;
use stdClass;

class DriftMessages extends DriftResource
{

    /**
     * Create a new Conversation
     *
     * @see    https://devdocs.drift.com/docs/creating-a-conversation
     * @param string $email
     * @param string $message
     * @param array $options
     * @return stdClass
     */
    public function createConversation(string $email, string $message, array $options = [])
    {
        return $this->client->post("conversations/new", array_merge(['message' => $message, 'email' => $email], $options));
    }


    /**
     * Create a Message
     *
     * @see    https://devdocs.drift.com/docs/creating-a-message
     * @param string $body Accepts HTML
     * @param $conversationId
     * @param string $userId
     * @param string $type
     * @param string $buttons
     * @return stdClass
     */
    public function createMessage($conversationId, string $body, $userId = '', string $type = 'chat', string $buttons = '')
    {
        $payload = ['body' => $body, 'type' => $type];

        if (!empty($userId)) $payload['userId'] = $userId;

        if (!empty($buttons)) $payload['buttons'] = $buttons;

        return $this->client->post("conversations/$conversationId/messages", $payload);
    }

    /**
     * Create a Private Note
     *
     * @param $conversationId
     * @param string $body
     * @param string $userId
     * @return stdClass
     */
    public function createNote($conversationId, string $body, $userId = '') {

        return $this->createMessage($conversationId, $body, $userId, 'private_note');
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
        return $this->client->get("conversations/list", $options);
    }

    /**
     * Get A Conversation
     *
     * @see    https://devdocs.drift.com/docs/retrieve-a-conversation
     * @param $conversationId
     * @param array $options
     * @return stdClass
     */
    public function get($conversationId, array $options = [])
    {
        return $this->client->get("conversations/$conversationId", $options);
    }

    /**
     * Get Messages from a Conversation
     *
     * @see    https://devdocs.drift.com/docs/retrieve-a-conversations-messages
     * @param $conversationId
     * @param array $options
     * @return stdClass
     */
    public function getMessages($conversationId, array $options = [])
    {
        return $this->client->get("conversations/$conversationId/messages", $options);
    }

    /**
     * Retrieving a Conversation's Transcript
     *
     * @see    https://devdocs.drift.com/docs/updating-a-contact
     * @param $conversationId
     * @param bool $json
     * @param array $options
     * @return stdClass
     */
    public function transcript($conversationId, $json = false, array $options = [])
    {
        if($json) $endpoint = "conversations/$conversationId/json_transcript";
        else $endpoint = "conversations/$conversationId/transcript";

        return $this->client->get($endpoint, $options);
    }

    /**
     * Retrieving a Conversation's Attachments
     *
     * @see    https://devdocs.drift.com/docs/updating-a-contact
     * @param $docID
     * @param array $options
     * @return stdClass
     */
    public function attachments($docID, array $options = [])
    {
        return $this->client->get("attachments/$docID/data", $options);
    }

    /**
     * Generate a conversation report
     *
     * @see    https://devdocs.drift.com/docs/conversation-reporting
     * @param array $options
     * @return stdClass
     */
    public function reporting(array $options = [])
    {
        return $this->client->post("reports/conversations", $options);
    }

    /**
     * Get Conversation Statuses
     *
     * @see    https://devdocs.drift.com/docs/bulk-conversation-statuses
     * @param array $options
     * @return stdClass
     */
    public function stats(array $options = [])
    {
        return $this->client->get("conversations/stats", $options);
    }


}
