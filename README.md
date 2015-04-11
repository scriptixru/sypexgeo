# GeoIP for Laravel 5
~~~
The data comes from a database and from service http://sypexgeo.net
~~~
----------

## Installation

- [SypexGeo for Laravel 5 on Packagist](https://packagist.org/packages/scriptixru/sypexgeo)
- [SypexGeo for Laravel 5 on GitHub](https://github.com/scriptixru/sypexgeo)

To get the latest version of SypexGeo simply require it in your `composer.json` file.

~~~
"scriptixru/sypexgeo": "0.2.*@dev"
~~~

You'll then need to run `composer install` to download it and have the autoloader updated.

Once GeoIP is installed you need to register the service provider with the application. Open up `config/app.php` and find the `providers` key.

~~~php
'providers' => array(

    'Scriptixru\SypexGeo\SypexGeoServiceProvider',

)
~~~

GeoIP also ships with a facade which provides the static syntax for creating collections. You can register the facade in the `aliases` key of your `config/app.php` file.

~~~php
'aliases' => array(

    'SypexGeo' => 'Scriptixru\SypexGeo\SypexGeoFacade',

)
~~~

### Publish the configurations

Run this on the command line from the root of your project:

~~~
$ php artisan vendor:publish
~~~

A configuration file will be publish to `config/sypexgeo.php`


## Usage


Getting the location data for a given IP:

```php
$location = \SypexGeo::get('232.223.11.11');
```

### Example Data

If data is received from the database - config/sypexgeo.php
('type'  => 'database')
```php
        [
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
        ];
```
If data is received from the webservice - config/sypexgeo.php
    (   'type'  => 'web_service',
        'view'  => 'json'
    )
```php
        [
              "ip" => "77.37.136.11"
              "city" => array:8 [
                     "id" => 524901
                     "lat" => 55.75222
                     "lon" => 37.61556
                     "name_ru" => "Москва"
                     "name_en" => "Moscow"
                     "okato" => "45"
                     "vk" => 1
                     "population" => 10381222
                  ]
              "region" => array:11 [
                    "id" => 524894
                    "lat" => 55.76
                    "lon" => 37.61
                    "name_ru" => "Москва"
                    "name_en" => "Moskva"
                    "iso" => "RU-MOW"
                    "timezone" => "Europe/Moscow"
                    "okato" => "45"
                    "auto" => "77, 97, 99, 177, 197, 199, 777"
                    "vk" => 0
                    "utc" => 3
              ]
              "country" => array:18 [
                    "id" => 185
                    "iso" => "RU"
                    "continent" => "EU"
                    "lat" => 60
                    "lon" => 100
                    "name_ru" => "Россия"
                    "name_en" => "Russia"
                    "timezone" => "Europe/Moscow"
                    "area" => 17100000
                    "population" => 140702000
                    "capital_id" => 524901
                    "capital_ru" => "Москва"
                    "capital_en" => "Moscow"
                    "cur_code" => "RUB"
                    "phone" => "7"
                    "neighbours" => "GE,CN,BY,UA,KZ,LV,PL,EE,LT,FI,MN,NO,AZ,KP"
                    "vk" => 1
                    "utc" => 3
              ]
              "error" => ""
              "request" => -2
              "created" => "2015.04.08"
              "timestamp" => 1428516249
        ];
```
#### Default Location

In the case that a location is not found the fallback location will be returned with the `default` parameter set to `true`. To set your own default change it in the configurations `config/geoip.php`

## Services

### [Scriptix](http://www.scriptix.ru)

- **Database Service**: To use the database version of SypexGeo services download the `SxGeoCityMax.dat` from (vendor/scriptixru/sypexgeo/scr/Scriptixru/SypexGeo) and extract it to `/database/sypexgeo/`. And that's it.





