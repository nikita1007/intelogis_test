<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('slow_deliveries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('from');
            $table->foreign('from')->references('kladr')->on('kladrs')->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('to');
            $table->foreign('to')->references('kladr')->on('kladrs')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('days');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slow_deliveries');
    }
};
