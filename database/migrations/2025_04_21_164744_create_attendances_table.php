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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->char('uuid_employee', 36);
            $table->char('uuid_customer', 36);
            $table->timestamp('attendance_time');
            $table->text('attendance_location');
            $table->integer('attendance_status_form');
            $table->integer('attendance_meeting_status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('uuid_employee')
                ->references('uuid')
                ->on('employee')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('uuid_customer')
                ->references('uuid')
                ->on('customer')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
