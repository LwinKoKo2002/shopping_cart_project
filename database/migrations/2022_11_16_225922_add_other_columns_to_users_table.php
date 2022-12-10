<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->unique()->nullable()->after('password');
            $table->foreignId('city_id')->nullable()->after('phone');
            $table->text('address')->nullable()->after('city_id');
            $table->string('ip')->nullable()->after('address');
            $table->text('user_agent')->nullable()->after('ip');
            $table->string('login_time')->nullable()->after('user_agent');
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
            $table->dropColumn(['phone','city_id','address','ip','user_agent','login_time']);
        });
    }
}
