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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->char('uuid_position', 36)->nullable();
            $table->char('uuid_tenant', 36)->nullable();
            $table->string('employee_nip')->nullable();
            $table->string('employee_nik')->nullable();
            $table->string('employee_name');
            $table->char('employee_gender', 1)->nullable();
            $table->date('employee_born_date')->nullable();
            $table->string('employee_born_place')->nullable();
            $table->string('employee_phone_number')->nullable();
            $table->text('employee_address')->nullable();
            $table->text('employee_photo')->nullable();
            $table->date('employee_retire')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('uuid_position')
                ->references('uuid')
                ->on('position')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('uuid_tenant')
                ->references('uuid')
                ->on('tenant')
                ->onDelete('cascade')
                ->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
