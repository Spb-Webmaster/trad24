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

            $table->string('info_title')->nullable();
            $table->string('info_img')->nullable();
            $table->text('info_desc')->nullable();

            $table->string('faq_title')->nullable();
            $table->longText('faq')->nullable();
            $table->text('faq_desc')->nullable();

            $table->string('video_title')->nullable();
            $table->longText('video')->nullable();
            $table->text('video_desc')->nullable();

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
