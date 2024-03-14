<?php

use App\Enums\OfficeType;
use App\Enums\OwnershipType;
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
        Schema::create('registration_fields', function (Blueprint $table) {
            $table->id();

            // step one sub step one (offices) 1.1

            $table->string('offices_title');
            $table->enum('ownership', OwnershipType::getValues());
            $table->string('city');
            $table->string('county');
            $table->string('address');
            $table->string('postal_code');
            $table->string('area');
            $table->enum('office_type', OfficeType::getValues());
            $table->json('phone_numbers');
            $table->json('fax_numbers');
            $table->string('foundation_administrative_management');
            $table->string('foundation_research_engineering');
            $table->string('foundation_laboratory');
            $table->string('foundation_welfare_service');
            $table->string('foundation_workshop');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_fields');
    }
};
