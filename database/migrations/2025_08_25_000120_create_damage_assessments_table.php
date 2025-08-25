<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('damage_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id')->constrained('incidents')->cascadeOnDelete();
            $table->unsignedInteger('classrooms_damaged_minor')->default(0);
            $table->unsignedInteger('classrooms_damaged_major')->default(0);
            $table->decimal('estimated_cost', 15, 2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('incident_id');
        });
    }
    public function down(): void {
        Schema::dropIfExists('damage_assessments');
    }
};