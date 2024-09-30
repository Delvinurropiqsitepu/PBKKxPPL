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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // kolom primary key
            $table->string('name'); // kolom string
            $table->integer('price'); // kolom number
            $table->enum('category', ['electronics', 'furniture', 'clothing']); // kolom enum
            $table->date('release_date'); // kolom date
            $table->boolean('is_available'); // kolom Boolean
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
