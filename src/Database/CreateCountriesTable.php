<?php

namespace BtyBugHook\Payments\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sortname', 191)->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('state', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->timestamps();
        });
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->timestamps();
        });

        Schema::table("state",function(Blueprint $table){
            $table->foreign('country_id')->references('id')->on('countries');
        });

        Schema::table("cities",function(Blueprint $table){
            $table->foreign('state_id')->references('id')->on('state');
        });

        $countries = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'countries.json')),true))->toArray();
        \DB::table("countries")->insert($countries);
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {

    }
}
