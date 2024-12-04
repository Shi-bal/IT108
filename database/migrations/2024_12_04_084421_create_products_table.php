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
            $table->id(); // Auto-incrementing ID
            $table->string('product_title'); // Title of the product
            $table->text('description')->nullable(); // Product description
            $table->string('image1')->nullable(); // Image path
            $table->string('image2')->nullable(); // Image path
            $table->string('image3')->nullable(); // Image path
            $table->integer('quantity'); // Quantity (integer)
            $table->decimal('price', 10, 2); // Price (decimal with 2 decimal places)

            $table->timestamps(); // Created at and updated at
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