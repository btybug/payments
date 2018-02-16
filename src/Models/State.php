<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 11.01.2018
 * Time: 13:30
 */

namespace BtyBugHook\Payments\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "state";

    public function cities(){
        return $this->hasMany(Cities::class,"state_id");
    }

    public static function getCities($country_id){
        $cities = self::where("country_id",$country_id)->with("cities")->get();
        return self::renderArrayOfCities($cities);
    }
    public static function renderArrayOfCities($cities){
        $arr = [];
        foreach ($cities as $city){
            $city = $city->cities;
            foreach ($city as $items){
                $arr[] = [
                    'id' => $items->id,
                    'text' => $items->name
                ];
            }
        }
        return $arr;
    }
}