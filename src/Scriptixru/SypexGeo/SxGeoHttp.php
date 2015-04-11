<?php
/**
 * Created by PhpStorm.
 * User: Валерий
 * Date: 11.04.2015
 * Time: 8:27
 */

namespace Scriptixru\SypexGeo;


class SxGeoHttp {

    /**
     * @var string license key sypexgeo.net
     */
    public $license_key = '';

    /**
     * @var string license key path
     */
    public $license_key_path;

    /**
     * @param $license_key
     */
    public function __construct($license_key){

        if(!empty($license_key)){
            $this->license_key  = $license_key;
            $this->license_key_path  = $license_key.'/';
        }


    }

    /**
     * Метод возваращает данные полученные от api.sypexgeo.net
     * @param $ip
     * @param $config
     * @return mixed
     */
    public function getCityFull($ip, $config){
        $view = $config->get('sypexgeo.sypexgeo.view', array());
        $url = $this->get_path($view,$ip);
        $get_array = 'get_array_'.$view;
        $apiSypexGeo = $this->file_get_contents_url($url);
        $arrSypexGeo = $this->$get_array($apiSypexGeo);
        return $arrSypexGeo;
    }

    /**
     * Метод считывания внешнего файла путем file_get_contents
     * @param string $url Строка с адресом к api.sypexgeo.net
     * @return $data Ответ api.sypexgeo.net
     */
    public function file_get_contents_url($url)
    {
        $data = file_get_contents($url);
        return $data;
    }
    /**
     * Метод считывания внешнего файла путем функции curl
     * @param string $url Строка с адресом к api.sypexgeo.net
     * @return $data Ответ api.sypexgeo.net
     */

    public function file_get_contents_curl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    /**
     * Метод генерации пути
     * @param $view
     * @param $ip
     * @return string
     */

    public function get_path($view,$ip){

        return 'http://api.sypexgeo.net/'.$this->license_key_path.$view.'/'.$ip;
    }

    /**
     * Метод декодирует json данные
     * @param $date
     * @return array
     */
    public function get_array_json($date){

        return json_decode( $date, true);
    }

    /**
     * Метод декодирует xml данные
     * @param $date
     * @return array
     */
    public function get_array_xml($date){

        $sxml = simplexml_load_string($date);
        $json = json_encode($sxml);
        $json_to_array = json_decode( $json, true);
        $json_array_decode['ip']        = $json_to_array['ip']['@attributes']['num'];
        $json_array_decode['city']      = $json_to_array['ip']['city'];
        $json_array_decode['region']    = $json_to_array['ip']['region'];
        $json_array_decode['country']   = $json_to_array['ip']['country'];
        $json_array_decode['error']     = $json_to_array['ip']['@attributes']['error'];
        $json_array_decode['request']   = $json_to_array['ip']['@attributes']['request'];
        $json_array_decode['created']   = $json_to_array['ip']['@attributes']['created'];
        $json_array_decode['timestamp'] = $json_to_array['ip']['@attributes']['timestamp'];
        return $json_array_decode;
    }
}