<?php

namespace BtyBugHook\Payments\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('countries')->nullable();
            $table->boolean('all')->default(0);
            $table->string('exceptions')->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {
        Schema::drop('zones');
    }
}
