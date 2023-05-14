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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');//le nom qui s'affiche sur l'url
            $table->string('description');
            $table->tinyInteger('status')->default('0');// 0 la categorie est affiché 1 la categorie ne s'affiche pas
            $table->tinyInteger('popular')->default('0');//0 la categorie est populaire 1 n'est pas populaire 
            $table->string('meta_title');
            $table->string('meta_descrip');
            $table->string('meta_keywords');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
