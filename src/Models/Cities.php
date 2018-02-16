<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 11.01.2018
 * Time: 13:30
 */

namespace BtyBugHook\Payments\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = "cities";

    public static function getZoneName($data){
        $str = '';
        $cities = self::whereIn("id",$data)->get()->toArray();
        foreach ($cities as $key => $city){
            $count = count($cities)-1;
            if($count == $key){
                $str .= $city["name"];
            }else{
                $str .= $city["name"].", ";
            }
        }
        return $str;
    }
    public static function getZoneIndexes($zones){
        if(!$zones){
            return null;
        }
        $zones_names = explode(", ",$zones);
        $cities = self::whereIn("name",$zones_names)->get()->pluck("id");
        return $cities;
    }
}