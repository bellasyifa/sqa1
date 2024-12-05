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
        Schema::table('mahasiswas', function (Blueprint $table) {
            // Mengubah kolom 'nim' menjadi nullable
            $table->string('nim')->nullable()->change();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            // Membatalkan perubahan dan menjadikan kolom 'nim' non-nullable
            $table->string('nim')->nullable(false)->change();
        });
    }
};
