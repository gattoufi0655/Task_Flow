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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->enum('statut', ['todo', 'in_progress', 'done'])->default('todo');
            $table->enum('priorite', ['basse', 'moyenne', 'haute'])->default('moyenne');
            $table->date('date_echeance')->nullable();

            $table->foreignId('projet_id')
                ->constrained('projets')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
