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
        Schema::create('families', function (Blueprint $table) {

            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('img')->nullable();

            $table->string('f_title')->nullable();
            $table->string('f_img')->nullable();
            $table->longText('f_text')->nullable();

            $table->string('b_title')->nullable();
            $table->string('b_img')->nullable();
            $table->longText('b_text')->nullable();

            $table->string('p_title')->nullable();
            $table->string('p_img')->nullable();
            $table->longText('p_text')->nullable();

            $table->string('k_title')->nullable();
            $table->string('k_img')->nullable();
            $table->longText('k_text')->nullable();

            $table->longText('files')->nullable();



            $table->json('params')->nullable();
            $table->string('published')->default(1);
            $table->text('metatitle')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
