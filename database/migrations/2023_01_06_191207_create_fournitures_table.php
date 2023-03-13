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
        Schema::create('fournitures', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('marque')->nullable();
            $table->string('reference')->nullable();
            $table->string('caracteristique')->nullable();
            $table->integer('qte_seuil')->nullable();
            $table->integer('c_moyen_achat')->nullable();
            $table->string('picture')->nullable();
            $table->foreignId('typefour_id')
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
        Schema::dropIfExists('fournitures');
    }
};
