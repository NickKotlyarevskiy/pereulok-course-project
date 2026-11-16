<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('walks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 140);
            $table->string('slug', 160)->unique();
            $table->string('district', 80)->index();
            $table->string('teaser', 240);
            $table->text('description');
            $table->unsignedSmallInteger('duration_minutes');
            $table->decimal('distance_km', 4, 1);
            $table->string('difficulty', 20);
            $table->string('start_point', 120);
            $table->string('finish_point', 120);
            $table->string('accent', 20)->default('clay');
            $table->json('stops');
            $table->boolean('is_featured')->default(false)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('walks');
    }
};
