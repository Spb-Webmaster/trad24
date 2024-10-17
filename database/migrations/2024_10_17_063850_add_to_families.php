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
        Schema::table('families', function (Blueprint $table) {

            $table->string('h_title')->nullable();
            $table->string('h_img')->nullable();
            $table->longText('h_text')->nullable();

            $table->string('h_img2')->nullable();
            $table->longText('h_text2')->nullable();

            $table->string('h_img3')->nullable();
            $table->longText('h_text3')->nullable();

            $table->string('h_img4')->nullable();
            $table->longText('h_text4')->nullable();

            $table->string('h_published')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('families', function (Blueprint $table) {
            //
        });
    }
};
