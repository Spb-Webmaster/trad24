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
        Schema::table('regobjects', function (Blueprint $table) {
            $table->string('activity_title')->nullable();
            $table->text('activity_desc')->nullable();
            $table->string('ritual_title')->nullable();
            $table->text('ritual_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regobjects', function (Blueprint $table) {
            //
        });
    }
};
