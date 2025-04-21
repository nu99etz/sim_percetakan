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
        Schema::create('visit', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->char('uuid_customer', 36);
            $table->char('uuid_attendance', 36);
            $table->string('visit_code')->unique();
            $table->integer('visit_status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('uuid_customer')
                ->references('uuid')
                ->on('customer')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('visit');
    }
};
