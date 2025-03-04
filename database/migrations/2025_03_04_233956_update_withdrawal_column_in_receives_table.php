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
        Schema::table('receives', function (Blueprint $table) {
            $table->decimal('withdrawal', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receives', function (Blueprint $table) {
            $table->decimal('withdrawal', 8, 2)->change();
        });
    }
};
