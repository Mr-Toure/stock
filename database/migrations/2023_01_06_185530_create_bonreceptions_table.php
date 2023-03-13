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
        Schema::create('bonreceptions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->dateTime('date_recep');
            $table->integer('status')->default(150);
            $table->integer('type')->nullable();
            $table->integer('sender')->nullable();
            $table->integer('treatBy')->nullable();
            $table->dateTime('treated_at')->nullable();
            $table->dateTime('validated_at')->nullable();
            $table->string('common')->nullable();
            $table->foreignId('agent_id')
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
        Schema::dropIfExists('bonreceptions');
    }
};
