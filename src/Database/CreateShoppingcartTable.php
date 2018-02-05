<?php

namespace BtyBugHook\Payments\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::create(config('cart.database.table'), function (Blueprint $table) {
            $table->string('identifier', 191);
            $table->string('instance', 191);
            $table->longText('content');
            $table->nullableTimestamps();

            $table->primary(['identifier', 'instance']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {
        Schema::drop(config('cart.database.table'));
    }
}
