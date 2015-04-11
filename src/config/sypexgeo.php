<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Service
    |--------------------------------------------------------------------------
    |
    | Current only supports 'sypexgeo'.
    |
    */

    'service' => 'sypexgeo',

    /*
    |--------------------------------------------------------------------------
    | Services settings
    |--------------------------------------------------------------------------
    |
    | Service specific settings.
    |
    */

    'sypexgeo' => array(
        'type'        => 'database', // database or web_service
        'path'        => '/database/sypexgeo/', // database path (works only with 'type' => 'database')
        'file'        => 'SxGeoCityMax.dat', // database file (works only with 'type' => 'database')
        'license_key' => '', //license key sypexgeo.net (works only with 'type' => 'web_service')
        'view'        => 'json' //json or xml -- json return array scalar types and string --xml return array only string types (works only with 'type' => 'web_service')

    ),

    /*
    |--------------------------------------------------------------------------
    | Default Location
    |--------------------------------------------------------------------------
    |
    | Return when a location is not found.
    |
    */

    'default_location' => [
            'city' => [
                'id' => 524901,
                'lat' => 55.75222,
                'lon' => 37.61556,
                'name_ru' => 'Москва',
                'name_en' => 'Moscow',
                'okato' => '45',
            ],
            'region' => [
                'id' => 524894,
                'lat' => 55.76,
                'lon' => 37.61,
                'name_ru' => 'Москва',
                'name_en' => 'Moskva',
                'iso' => 'RU-MOW',
                'timezone' => 'Europe/Moscow',
                'okato' => '45',
            ],
            'country' => [
                'id' => 185,
                'iso' => 'RU',
                'continent' => 'EU',
                'lat' => 60,
                'lon' => 100,
                'name_ru' => 'Россия',
                'name_en' => 'Russia',
                'timezone' => 'Europe/Moscow',
            ],
        ],

);