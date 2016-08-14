<?php

namespace iTraq;

class User
{
    private $apiKey;
    private $client;

    /**
     * Construct an instance of the HttpClient.
     */
    public function __construct($apiKey, $token = null)
    {
        $this->client = new HttpClient();
        $this->apiKey = $apiKey;
        if (!empty($token) && !$this->client->token) $this->client->token = $token;
    }

    /**
     * Login and get the X-AUTH-TOKEN
     *
     * @param  string $email user loginname (= email)
     * @param  string $password user password
     * @return string token (X-AUTH-TOKEN) from response header
     */
    public function login($email, $password)
    {
        if (empty($this->client->token))
        {
            $response = $this->client->request('POST', 'login', [
                'json' => [
                    'email' => $email,
                    'password' => $password,
                    'apiKey' => $this->apiKey
                ]
            ]);

            $code = $response->getStatusCode();
            if ($code == 200) {
                if ($response->hasHeader('X-AUTH-TOKEN')) {
                    $token = $response->getHeaderLine('X-AUTH-TOKEN');
                    $this->client->token = $token;
                    return $token;
                } else {
                    echo 'No X-AUTH-TOKEN in header.';
                }
            } else {
                echo $code . ' ' . $response->getBody()->getContents();
            }
        }
    }
}
