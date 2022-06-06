<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbPessoas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->date('birth_date');
            $table->integer('sex');
            $table->integer('nationality');
            $table->string('cpf', 55);
            $table->string('passaporte', 55);
            $table->string('rg', 55);
            $table->string('zip_code', 55);
            $table->string('address', 55);
            $table->string('number', 55);
            $table->string('complement', 55);
            $table->string('district', 55);
            $table->string('city', 55);
            $table->integer('state');
            $table->string('email', 55);
            $table->string('cellphone', 55);
            $table->string('password', 55);

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
        //
    }
}
