<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('incident_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id')->constrained('incidents')->cascadeOnDelete();
            $table->string('file_path');          // storage path
            $table->string('file_type', 64)->nullable();   // mime or logical type
            $table->string('original_name')->nullable();
            $table->timestamps();

            $table->index('incident_id');
        });
    }
    public function down(): void {
        Schema::dropIfExists('incident_attachments');
    }
};
