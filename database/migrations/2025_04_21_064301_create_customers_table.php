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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->char('uuid_employee', 36);
            $table->char('uuid_business_type', 36);
            $table->string('customer_company_name');
            $table->string('customer_owner_name');
            $table->text('customer_address')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_province')->nullable();
            $table->string('customer_regency')->nullable();
            $table->string('customer_district')->nullable();
            $table->string('customer_contact_name')->nullable();
            $table->string('customer_contact_phone')->nullable();
            $table->string('customer_latitude')->nullable();
            $table->string('customer_longitude')->nullable();
            $table->string('customer_telephone')->nullable();
            $table->string('customer_email')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('uuid_employee')
                ->references('uuid')
                ->on('employee')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('uuid_business_type')
                ->references('uuid')
                ->on('business_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
