<?php

namespace BtyBugHook\Payments\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertIntoCitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        ini_set('max_execution_time', 300);
        $countries = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'cities1.json')),true))->toArray();


        $sql = array();
        foreach( $countries as $row ) {
            $sql[] = '("'.$row['id'].'", "'.($row["name"]).'", "'.$row['state_id'].'")';
        }
        \DB::select('INSERT INTO cities (id,cities.name,state_id) VALUES '.implode(',', $sql));
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {

    }
}
