<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('ruc');
            $table->string('bank');
            $table->string('account');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('web');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('providers');
    }
}
