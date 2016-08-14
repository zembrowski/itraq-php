<?php

namespace iTraq;

class Human
{
    private $devices;
    private $user;

    public function __construct($token)
    {
        $this->devices = new Devices($token);
        $this->user = new User($token);
    }

    public function myDeviceIds($devices = null)
    {
        if (is_null($devices)) $devices = $this->devices->devices();

        $decoded = json_decode($devices, true);
        $ids = null;

        foreach ($decoded['data'] as $data) {
            $ids[$data['id']] = $data['name'];
        }

        return $ids;
    }

    public function myLastLocation($deviceId, $locations = null, $includeTemperature = false)
    {
        if (is_null($locations)) $locations = $this->devices->locations($deviceId, true, false, 1);

        $decoded = json_decode($locations, true);

        $location = [
            'latitude' => $decoded['data']['content'][0]['latitude'],
            'longitude' => $decoded['data']['content'][0]['longitude'],
            'radius' => $decoded['data']['content'][0]['radius'],
            'time' => $decoded['data']['content'][0]['time'],
        ];

        if ($includeTemperature) $location['temperature'] = $decoded['content'][0]['temperature'];

        return $location;
    }
}
