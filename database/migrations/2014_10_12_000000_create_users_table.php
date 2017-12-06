<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('name')->nullable()->default(null);
                $table->date('date_of_birth')->nullable()->default(null);
                $table->string('gender')->nullable()->default(null);
                $table->string('phone')->nullable()->default(null);
                $table->string('address')->nullable()->default(null);
                $table->integer('level')->default(0);
                $table->string('avatar')->nullable()->default(null);
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
