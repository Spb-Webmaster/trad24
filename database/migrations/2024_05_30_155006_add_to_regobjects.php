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


            $table->string('contact_title')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_phone1')->nullable();
            $table->string('contact_phone2')->nullable();
            $table->string('contact_phone3')->nullable();
            $table->text('contact_desc')->nullable();


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
