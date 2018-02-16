<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 11.01.2018
 * Time: 13:30
 */

namespace BtyBugHook\Payments\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";

    public function states(){
        return $this->hasMany(State::class,"country_id");
    }

    public static function countries(){
        $countries = self::all()->pluck("name","id")->toArray();
        return $countries;
    }
    public static function countriesGetName($id){
        $country = self::where("id",$id)->select("name")->first();
        return $country->name;
    }
    public static function getCountryIndex($name){
        $country = self::where("name",$name)->first();
        return $country->id;
    }
    public static function getCitiesByCountryId($id){
        $country = self::where("id",$id)->with(["states"=>function($table){
            $table->with("cities");
        }])->first();
        $arr = [];
        foreach ($country->states as $state){
           foreach ($state->cities as $key => $city){
               $arr[$city->id] = $city->name;
           }
        }
        return $arr;
    }

}