<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_sinhala');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_sinhala')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('original_price', 10, 2);
            $table->string('image')->nullable();
            $table->string('grade_level')->nullable(); // Grade 1, O/L, etc.
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bundles');
    }
};
