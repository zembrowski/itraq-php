<?php

namespace iTraq;

class Devices
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

    /**
     * Get list of devices.
     *
     * @return array response body
     */
    public function devices()
    {
        $headers = $this->client->headers();
        $response = $this->client->request('GET', 'devices', $headers);
        return $response->getBody();
    }

    /**
     * Get device information by Id.
     *
     * @return array response body
     */
    public function device($deviceId)
    {
        $headers = $this->client->headers();
        $response = $this->client->request('GET', 'devices/' . $devideId . '/', $headers);
        return $response->getBody();
    }

    /**
     * Get list of locations.
     *
     * @return array response body
     */
    public function locations($deviceId, $includeLocation = true, $includeTemperature = false, $size = 10, $page = 1)
    {
        $headers = $this->client->headers();
        $query = [
            'query' => [
                'includeLocation' => $includeLocation,
                'includeTemperature' => $includeTemperature,
                'size' => $size,
                'page' => $page
            ]
        ];
        $data = array_merge($headers, $query);
        $response = $this->client->request('GET', 'devices/' . $deviceId . '/history', $data);
        return $response->getBody();
    }
    /**
     * Get list of temperature measurments.
     *
     * @return array response
     */
    public function temperatures($deviceId, $size = null, $page = null)
    {
        $response = $this->locations($deviceId, false, true, $size, $null);
        return $response->getBody();
    }
}
