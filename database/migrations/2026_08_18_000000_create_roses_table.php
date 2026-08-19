<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->json('locations');
            $table->json('sizes');
            $table->string('fragrance')->default('medium');
            $table->json('colours');
            $table->decimal('price', 8, 2)->nullable();
            $table->string('shop_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roses');
    }
};
