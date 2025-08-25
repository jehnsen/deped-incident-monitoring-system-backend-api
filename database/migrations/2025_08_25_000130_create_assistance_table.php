<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('assistance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id')->constrained('incidents')->cascadeOnDelete();
            $table->string('assistance_type', 40); // food|water|medicine|shelter|cash|others
            $table->decimal('quantity', 12, 2)->nullable();
            $table->string('unit', 24)->nullable(); // sacks, liters, pcs, etc.
            $table->timestamp('delivered_at')->nullable();
            $table->string('delivered_by')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->index(['incident_id', 'assistance_type']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('assistance');
    }
};