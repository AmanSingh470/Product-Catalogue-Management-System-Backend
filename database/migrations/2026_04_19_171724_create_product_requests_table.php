<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            $table->foreignId('category_id')->nullable()
                ->constrained('categories')
                ->cascadeOnDelete();
            $table->foreignId('company_id')->nullable()
                ->constrained('companies')
                ->cascadeOnDelete();
            $table->foreignId('division_id')->nullable()
                ->constrained('divisions')
                ->cascadeOnDelete();
            $table->foreignId('segment_id')->nullable()
                ->constrained('segments')
                ->cascadeOnDelete();
            $table->string('description', 1000)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_requests');
    }
};