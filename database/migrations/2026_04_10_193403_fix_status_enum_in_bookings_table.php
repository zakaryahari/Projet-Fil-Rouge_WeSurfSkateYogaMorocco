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
        // MySQL ne supporte pas ALTER COLUMN sur enum directement, on recrée
        DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending','confirmed','finished','cancelled','maintenance') NOT NULL DEFAULT 'pending'");
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
};
