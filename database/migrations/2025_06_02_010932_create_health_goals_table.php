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
        Schema::create('health_goals', function (Blueprint $table) {
            $table->id();
                    $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->float('target_weight')->nullable();
        $table->float('target_bmi')->nullable();
        $table->float('target_body_fat')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_goals');
    }
};
