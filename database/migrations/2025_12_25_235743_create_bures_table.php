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
        Schema::create('bures', function (Blueprint $table) {
            $table->id();
            $table->string('broj_bureta')->unique();
            $table->integer('kapacitet');
            $table->string('tip_drveta');
            $table->enum('status', ["prazno","puno","ciscenje"]);
            $table->text('napomena')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bures');
    }
};
