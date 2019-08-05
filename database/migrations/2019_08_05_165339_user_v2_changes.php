<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserV2Changes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->integer('album_credit')->default(0)->after('remember_token');
            $table->integer('album_created')->default(0)->after('album_credit');
            $table->date('membership_till')->nullable()->after('album_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('album_credit');
            $table->dropColumn('album_created');
            $table->dropColumn('membership_till');
        });
    }
}
