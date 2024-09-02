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
        Schema::table('regobject_media', function (Blueprint $table) {

            $table->text('audio')->nullable();
            $table->string('audio_title')->nullable();
            $table->text('audio_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regobject_media', function (Blueprint $table) {
            //
        });
    }
};
