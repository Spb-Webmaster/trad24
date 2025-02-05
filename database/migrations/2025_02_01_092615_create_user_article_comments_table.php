<?php

use App\Models\User;
use App\Models\UserArticle;
use App\Models\UserArticleComment;
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
        Schema::create('user_article_comments', function (Blueprint $table) {

            $table->id();
            $table->text('text');
            $table->longText('params')->nullable();
            $table->integer('viewer')->unsigned()->default(1);

            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignIdFor(UserArticle::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignIdFor(UserArticleComment::class)
                ->nullable()
                ->constrained();

            $table->integer('published')->default(1);
            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_article_comments');
    }
};
