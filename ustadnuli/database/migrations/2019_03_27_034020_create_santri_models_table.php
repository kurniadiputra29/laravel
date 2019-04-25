<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantriModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('nama', 100);
            $table->string('nama');
            $table->string('email')->unique();
            $table->boolean('gender');
            $table->string('password');
            $table->integer('provinsi_id');
            $table->timestamps();// untuk otomatis membuatkan 2 kolom
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santri_models');
    }
}
