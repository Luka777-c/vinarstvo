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
        Schema::create('partija_grozdjas', function (Blueprint $table) {
            $table->id();
            $table->string('sorta', 100);
            $table->integer('kolicina');
            $table->enum('status', ['prijem', 'u_obradi', 'zavrseno']);
            $table->date('datum');
            $table->text('napomena')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partija_grozdjas');
    }
};
