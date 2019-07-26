<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile')->after('name');
            $table->string('address')->nullable()->after('password');
            $table->string('location')->nullable()->after('address');
            $table->string('avatar')->nullable()->after('location');
            $table->string('theme')->nullable()->after('avatar');
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('adddress');
            $table->dropColumn('location');
            $table->dropColumn('avatar');
            $table->dropColumn('theme');
        });
    }
}
