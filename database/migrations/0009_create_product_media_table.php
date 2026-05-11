<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_media', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->nullable()
                ->constrained('products')
                ->cascadeOnDelete();
            $table->enum('media_type', [
                'file',
                'image',
                'video',
            ]);
            $table->string('media_url', 500);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_media');
    }
};
