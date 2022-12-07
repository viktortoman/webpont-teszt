<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();

            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->string('weather');
            $table->string('temp');
            $table->string('temp_min');
            $table->string('temp_max');
            $table->string('humidity');
            $table->string('pressure');

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
        Schema::dropIfExists('weather');
    }
};
