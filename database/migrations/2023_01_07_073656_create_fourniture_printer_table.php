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
        Schema::create('fourniture_printer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('printer_id')
                ->nullable()
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreignId('fourniture_id')
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
        Schema::dropIfExists('fourniture_printer');
    }
};
