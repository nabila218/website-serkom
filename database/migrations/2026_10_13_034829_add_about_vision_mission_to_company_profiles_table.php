<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['about', 'vision', 'mission'] as $column) {
            if (! Schema::hasColumn('company_profiles', $column)) {
                Schema::table('company_profiles', function (Blueprint $table) use ($column) {
                    $table->text($column)->nullable();
                });
            }
        }
    }

    public function down(): void
    {
        // dikosongkan agar kolom lama tidak ikut terhapus
    }
};