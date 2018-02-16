<?php

namespace BtyBugHook\Payments\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShippingAddressColumn extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('shipping_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('shipping_address');
        });
    }
}
