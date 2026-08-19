<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('roses', function (Blueprint $table) {
            $table->json('light')->nullable();
            $table->json('aspects')->nullable();
            $table->json('soils')->nullable();
            $table->string('flowering')->default('repeat_flowering');
            $table->json('features')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('roses', function (Blueprint $table) {
            $table->dropColumn(['light', 'aspects', 'soils', 'flowering', 'features']);
        });
    }
};
