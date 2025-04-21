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
        Schema::create('tenant', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->string('tenant_name')->nullable();
            $table->text('tenant_logo')->nullable();
            $table->string('tenant_address')->nullable();
            $table->string('tenant_poscode')->nullable();
            $table->string('tenant_district')->nullable();
            $table->string('tenant_province')->nullable();
            $table->string('tenant_city')->nullable();
            $table->string('tenant_phone_number')->nullable();
            $table->string('tenant_email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant');
    }
};
