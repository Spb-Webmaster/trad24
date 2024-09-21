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
        Schema::create('family_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('url')->nullable();

            $table->string('img')->nullable();
            $table->longText('text')->nullable();

            $table->string('img2')->nullable();
            $table->longText('text2')->nullable();

            $table->string('img3')->nullable();
            $table->longText('text3')->nullable();

            $table->string('img4')->nullable();
            $table->longText('text4')->nullable();



            $table->foreignIdFor(Family::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->longText('css')->nullable();
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
        Schema::dropIfExists('family_pages');
    }
};
