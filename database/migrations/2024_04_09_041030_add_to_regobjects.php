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
            $table->string('maket_img')->nullable();
            $table->string('maket_color')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('shortdesc')->nullable();

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
