<?php


namespace Hillel\Maxmind;

use Yuriy\Geo\Geoservice;
use GeoIp2\Database\Reader;

class MaxmindGeoService implements GeoService
{
    protected $reader;

    protected $data;

    public function __construct()
    {
        $this->reader =
            new Reader(base_path() . DIRECTORY_SEPARATOR .
                'database' . DIRECTORY_SEPARATOR . 'geo' . DIRECTORY_SEPARATOR . 'geoip.mmdb');

    }

    public function parse($ip)
    {
        $this->data = $this->reader->country($ip);
    }

    public function continentCode()
    {
        return $this->data->continent->code;
    }

    public function countryCode()
    {
        return $this->data->country->isoCode;
    }
}
