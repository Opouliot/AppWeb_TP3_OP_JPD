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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('release_year',4);
            $table->foreignId('language_id')->constrained();
            $table->smallInteger('length')->nullable();
            $table->enum('rating', ['G', 'PG','PG-13','R','NC-17'])->nullable()->default('G');
            $table->set('special_features',['Trailers','Commentaries','Deleted Scenes','Behind the Scenes'])->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
        Schema::dropIfExists('films');
    }
};
