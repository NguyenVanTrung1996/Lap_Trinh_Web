<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable()->default(null);
                $table->string('category')->nullable()->default(null);
                $table->integer('price')->nullable()->default(0);
                $table->text('description', 1000000)->nullable()->default(null);
                $table->float('rated')->nullable()->default(0);
                $table->integer('comment')->nullable()->default(0);
                $table->integer('status')->nullable()->default(null);
                $table->string('avatar')->nullable()->default(null);
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
        Schema::dropIfExists('products');
    }
}
