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



            $table->string('f_img2')->nullable();
            $table->longText('f_text2')->nullable();

            $table->string('f_img3')->nullable();
            $table->longText('f_text3')->nullable();

            $table->string('f_img4')->nullable();
            $table->longText('f_text4')->nullable();

            $table->string('b_img2')->nullable();
            $table->longText('b_text2')->nullable();

            $table->string('b_img3')->nullable();
            $table->longText('b_text3')->nullable();

            $table->string('b_img4')->nullable();
            $table->longText('b_text4')->nullable();

            $table->string('p_img2')->nullable();
            $table->longText('p_text2')->nullable();

            $table->string('p_img3')->nullable();
            $table->longText('p_text3')->nullable();

            $table->string('p_img4')->nullable();
            $table->longText('p_text4')->nullable();

            $table->string('k_img2')->nullable();
            $table->longText('k_text2')->nullable();

            $table->string('k_img3')->nullable();
            $table->longText('k_text3')->nullable();

            $table->string('k_img4')->nullable();
            $table->longText('k_text4')->nullable();

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
