<?php

namespace BtyBugHook\Payments\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertIntoStateTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        $countries = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'state.json')),true))->toArray();
        \DB::table("state")->insert($countries);
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {

    }
}
