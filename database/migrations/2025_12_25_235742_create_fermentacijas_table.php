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
        Schema::create('fermentacijas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partija_grozdja_id');
            $table->date('datum');
            $table->decimal('temperatura', 5, 2);
            $table->decimal('secer', 5, 2);
            $table->string('faza');
            $table->text('napomena')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fermentacijas');
    }
};
