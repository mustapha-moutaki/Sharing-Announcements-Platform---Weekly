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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table -> string('title');
            $table -> text('description');
            $table -> decimal('prix', 10, 2);
            $table -> string('image')->nullable();
            $table -> foreignId ('userId') -> constrained('users');
            $table -> foreignId('categoryId')->constrained('categories');
            $table ->enum('status', ['active', 'draft', 'archived'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
