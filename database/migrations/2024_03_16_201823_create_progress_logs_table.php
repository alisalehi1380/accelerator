<?php

use App\Enums\Action;
use App\Enums\RegistrationStatus;
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
        Schema::create('progress_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tracking_code_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->ipAddress('ip')->nullable();
            $table->string('browser')->nullable();
            $table->string('platform')->nullable();
            $table->foreignId('step_id');
            $table->enum('status', [RegistrationStatus::getValues()])->default(RegistrationStatus::NOT_COMPLETED);
            $table->enum('action', Action::getValues());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_logs');
    }
};
