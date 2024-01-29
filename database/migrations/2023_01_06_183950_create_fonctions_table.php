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
        Schema::create('fonctions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('initial');

            $table->foreignId('direction_id')
                ->nullable()
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreignId('ssdirection_id')
                ->nullable()
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreignId('service_id')
                ->nullable()
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::dropIfExists('fonctions');
    }
};
