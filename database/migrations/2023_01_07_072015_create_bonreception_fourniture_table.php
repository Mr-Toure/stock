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
        Schema::create('bonreception_fourniture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bonreception_id')
                ->nullable()
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreignId('fourniture_id')
            ->nullable()
            ->constrained()
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->integer('qte');
            $table->integer('sent')->nullable();
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
        Schema::dropIfExists('bonreception_fourniture');
    }
};
