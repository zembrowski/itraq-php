<?php

namespace iTraq;

class Sharing
{
    private $client;

    /**
     * Construct an instance of the HttpClient.
     */
    public function __construct($token = null)
    {
        $this->client = new HttpClient();
        if (!empty($token) && !$this->client->token) $this->client->token = $token;
    }
}
