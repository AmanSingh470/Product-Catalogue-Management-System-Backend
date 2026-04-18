<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();

            $table->foreignId('category_id')->nullable()
                ->constrained('categories')->nullOnDelete();

            $table->foreignId('segment_id')->nullable()
                ->constrained('segments')->nullOnDelete();

            $table->foreignId('division_id')->nullable()
                ->constrained('divisions')->nullOnDelete();

            $table->foreignId('company_id')->nullable()
                ->constrained('companies')->nullOnDelete();

            $table->foreignId('contact_person_id')->nullable()
                ->constrained('company_contact_persons')->nullOnDelete();

            $table->text('main_advantages')->nullable();
            $table->text('key_facts')->nullable();
            $table->text('applications')->nullable();

            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};