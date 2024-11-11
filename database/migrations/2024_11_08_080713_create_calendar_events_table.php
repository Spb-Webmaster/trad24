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
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();

            $table->string('subtitle')->nullable();
            $table->string('teaser')->nullable();
            $table->string('teaser_img')->nullable();

            $table->string('url')->nullable();

            $table->string('img')->nullable();
            $table->longText('text')->nullable();

            $table->string('img2')->nullable();
            $table->longText('text2')->nullable();

            $table->string('published')->default(1);
            $table->json('params')->nullable();
            $table->json('module')->nullable();



            $table->string('metatitle')->nullable();
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
        Schema::dropIfExists('calendar_events');
    }
};
