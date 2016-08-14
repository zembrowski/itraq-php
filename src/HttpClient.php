<?php

namespace iTraq;

use GuzzleHttp\Client;

class HttpClient
{
    const SCHEME = 'https';
    const HOST = 'api.itraq.com';
    private $version = 'v3';
    public $token;
    private $client;

    /**
     * Construct a new http client.
     */
    public function __construct()
    {
        $uri = self::SCHEME . '://' . self::HOST . '/' . $this->version . '/';
        $this->client = new Client([
            'base_uri' => $uri
        ]);
    }

    /**
     * Requests handler with custom exception catcher
     *
     * @param  string $method HTTP request method
     * @param  string $request_url request url for base_uri
     * @return response
     */
    public function request($method, $request_url, $data = [])
    {
        try {
            $response = $this->client->request($method, $request_url, $data);
            return $response;
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody()->getContents();
        }
    }

    /**
     * Get contect of the image by pictureId
     *
     * @param  string $method HTTP request method
     * @param  string $request_url request url for base_uri
     * @return response
     */
    public function image($pictureId)
    {
        $response = $this->request('GET', 'images/' . $pictureId);
        return $response->getBody()->getContents();
    }

    /**
     * Token header
     *
     * @return array X-AUTH-TOKEN header as array for request()
     */
    public function headers()
    {
        $array = [
            'headers' => [
                'X-AUTH-TOKEN' => $this->token
            ]
        ];
        return $array;
    }
}
