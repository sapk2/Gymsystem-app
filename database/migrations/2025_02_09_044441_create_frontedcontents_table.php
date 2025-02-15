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
        Schema::create('frontedcontents', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('tagline');
            $table->string('heading');
            $table->string('startlink');
            $table->string('feature_title');
            $table->string('feature_offer');
            $table->string('feature_link');
            $table->string('hours_week');
            $table->string('hours_sat');
            $table->enum('status', ['open', 'closed'])->default('closed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontedcontents');
    }
};
