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
        Schema::create('attendance_detail', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->char('uuid_attendance', 36);
            $table->enum('attendance_details_check', ['IN', 'OUT']);
            $table->timestamp('attendance_details_time');
            $table->text('attendance_details_image');
            $table->text('attendance_details_description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('uuid_attendance')
                ->references('uuid')
                ->on('attendance')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_detail');
    }
};
