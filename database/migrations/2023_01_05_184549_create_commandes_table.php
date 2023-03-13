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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('status')->default(0);
            $table->dateTime('date_com');
            $table->foreignId('famille_id')
                ->nullable()
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('restrict');
                $table->foreignId('fournisseur_id')
                ->nullable()
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreignId('user_id')
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
        Schema::dropIfExists('commandes');
    }
};
