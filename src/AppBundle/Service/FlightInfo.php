<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 16/05/18
 * Time: 21:42
 */

namespace AppBundle\Service;


class FlightInfo
{
    /**
     * @var string
     */
    private $unit;

    /**
     * Constructor
     *
     * @param string $unit Defined in config.yml
     */
    public function __construct($unit)
    {
        $this->unit = $unit;
    }


    /**
     * Distance calculation between latitude/longitude based on Harnive's formula
     * http://www.codecodex.com/wiki/Calculate_Distance_Between_Two_Points_on_a_Globe#PHP
     *
     * @param float $latitudeFrom  Departure
     * @param float $longitudeFrom Departure
     * @param float $latitudeTo    Arrival
     * @param float $longitudeTo   Arrival
     *
     * @return float
     */
    public function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $d = 0;
        $earth_radius = 6371;
        $dLat = deg2rad($latitudeTo - $latitudeFrom);
        $dLon = deg2rad($longitudeTo - $longitudeFrom);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));

        switch ($this->unit) {
            case 'km':
                $d = $c * $earth_radius;
                break;
            case 'mi':
                $d = $c * $earth_radius / 1.609344;
                break;
            case 'nmi':
                $d = $c * $earth_radius / 1.852;
                break;
        }

        return $d;
    }

    /**
     * Travel time between Departure and Arrival of the flight
     * @param float $distance Distance
     * @param float $planespeed Cruisespeed
     *
     */
    public function getTime($distance, $planespeed)
    {
        // travel time = Distance / plane speed
        $travelTime = $distance / $planespeed;
        $travelTime *= 60;
        $format = '%02dh%02dmin';
        $hours = floor($travelTime / 60);
        $minutes = ($travelTime % 60);
        return sprintf($format, $hours, $minutes);
    }
}