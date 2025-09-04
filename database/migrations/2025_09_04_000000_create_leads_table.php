<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('gclid')->nullable();
            $table->string('sub_id')->nullable();
            // Using only created_at (no updated_at) for this mini-test
            $table->timestamp('created_at')->useCurrent();

            // Task B: the single MySQL index we’re adding
            // $table->index('created_at', 'idx_leads_created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
