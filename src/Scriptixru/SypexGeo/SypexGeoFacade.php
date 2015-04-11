<?php namespace Scriptixru\SypexGeo;

use Illuminate\Support\Facades\Facade;

class SypexGeoFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'sypexgeo'; }

}