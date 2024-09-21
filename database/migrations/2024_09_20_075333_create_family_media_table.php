<?php

use App\Models\Family;
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
        Schema::create('family_media', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->string('img')->nullable();
            $table->longText('text')->nullable();

            $table->foreignIdFor(Family::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->longText('gallery')->nullable();
            $table->string('gallery_title')->nullable();
            $table->longText('gallery_desc')->nullable();

            $table->longText('video')->nullable();
            $table->string('video_title')->nullable();
            $table->longText('video_desc')->nullable();

            $table->longText('audio')->nullable();
            $table->string('audio_title')->nullable();
            $table->longText('audio_desc')->nullable();

            $table->longText('css')->nullable();
            $table->json('params')->nullable();
            $table->string('published')->default(1);
            $table->longText('metatitle')->nullable();
            $table->longText('description')->nullable();
            $table->longText('keywords')->nullable();
            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_media');
    }
};
